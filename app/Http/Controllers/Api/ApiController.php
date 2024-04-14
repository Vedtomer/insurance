<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Slider;
use App\Models\Agent;
use App\Models\Policy;
use Carbon\Carbon;
use App\Models\PointRedemption;

class ApiController extends Controller
{
    public function index(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $startDate = !empty($startDate) ? Carbon::createFromFormat('d-m-Y', $startDate)->startOfDay() : Carbon::now()->firstOfMonth();
        $endDate = !empty($endDate) ? Carbon::createFromFormat('d-m-Y', $endDate)->endOfDay() : Carbon::now();

        $agent = auth()->guard('api')->user();
        $agent_id = $agent->id;
        $cutAndPayTrue = $agent->cut_and_pay;

        $totalCommission = Policy::whereBetween('policy_start_date', [$startDate, $endDate])
            ->where('agent_id', $agent_id)
            ->sum('agent_commission');

        $totalPolicy = Policy::whereBetween('policy_start_date', [$startDate, $endDate])
            ->where('agent_id', $agent_id)
            ->count();

        $totalPremiumPaid = Policy::whereBetween('policy_start_date', [$startDate, $endDate])
            ->where('agent_id', $agent_id)
            ->sum('premium');

        $transaction = Transaction::where('agent_id', $agent_id)
            ->whereBetween('created_at', [$startDate, $endDate])
            ->sum('amount');

        $pendingPremium = Policy::where('payment_by', 'self')
            ->where('agent_id', $agent_id)
            ->whereBetween('policy_start_date', [$startDate, $endDate])
            ->sum('premium');

        if ($cutAndPayTrue) {
            $pendingPremium -= $transaction - $totalCommission;
        } else {
            $pendingPremium -= $transaction;
        }


        $dummyData = [
            'total_commission' => $totalCommission,
            'total_policy' => $totalPolicy,
            'total_premium_paid' => $totalPremiumPaid,
            'pending_premium' => $pendingPremium,
            'sliders' => Slider::where('status', 1)->pluck('image')->toArray(),
        ];

        return response()->json([
            'message' => 'Success',
            'status' => true,
            'data' => $dummyData
        ]);
    }



    public function Transaction($id = null)
    {

        if ($id !== null) {

            $transactions = Transaction::where('policy_no', $id)->first();
        } else {

            $user_id = auth()->guard('api')->user()->id;

            // $transaction = Transaction::where('user_id', $user->id)->get();

            $agentId = auth()->guard('api')->user()->id;

            $transactions = Transaction::join('royalsundaram', 'transactions.policy_no', '=', 'royalsundaram.policy')
                ->where('royalsundaram.agent_id', $agentId)->select('transactions.id', 'transactions.net_amount', 'transactions.gst', 'transactions.total_amount', 'transactions.is_payment_done', 'transactions.payment_by', 'transactions.is_agent_paid_premium_amount')
                ->get();
        }


        if ($transactions) {
            return response()->json(['message' => 'Success', 'status' => true, 'data' => $transactions]);
        } else {
            return response()->json(['message' => 'Transaction not found', 'status' => false, 'data' => null]);
        }
    }


    public function getActiveSliders()
    {
        $sliders = Slider::where('status', 1)->pluck('image')->toArray();
        return response()->json(['message' => 'Success', 'status' => true, 'data' => $sliders]);
    }

    public function getPolicy(Request $request)
    {
        try {
            $agent = new Agent();
            $result = $agent->getPoliciesCount($request);
            return $result;
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getPointsSummary(Request $request)
    {
        try {

            $data = $this->points($request);

            return response([
                'status' => true,
                'data' => $data,
                'message' => 'Points History'
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function pointsRedemption(Request $request)
    {
        $rules = [
            'points' => 'required|numeric|min:0',
        ];

        $messages = [
            'points.required' => 'Points are required.',
            'points.numeric' => 'Points must be a number.',
            'points.min' => 'Points must be at least :min.',
        ];
        $validator = \Illuminate\Support\Facades\Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return response()->json(['message' => "Points are requireds", 'status' => false, 'data' => null]);
        }
        $points = $request->input('points');
        $agent =  auth()->guard('api')->user();
        $agent_id = $agent->id;

        $inProgressRedemption = PointRedemption::where('agent_id', $agent_id)
            ->where('status', 'in_progress')
            ->exists();

        if ($inProgressRedemption) {
            return response()->json(['message' => 'You already have a redemption in progress.', 'status' => false, 'data' => null]);
        }

        if ($agent->cut_and_pay) {
            return response()->json(['message' => 'You are not allowed to redeem points because "cut and pay" is enabled for your account.', 'status' => false, 'data' => null]);
        }

        $total = Policy::where('agent_id', $agent_id)
            ->sum('agent_commission');


        $redeemPoints = PointRedemption::where('agent_id', $agent_id)
            ->whereIn('status', ['in_progress', 'completed'])
            ->sum('points');

        $remainingPoints = $total - $redeemPoints;

        if ($points > $remainingPoints) {
            return response()->json(['message' => 'Redeemed points cannot exceed remaining points.', 'status' => false, 'data' => null]);
        }


        $tds = 0.05 * $points;
        $amountToBePaid = $points - $tds;

        $pointRedemption = new PointRedemption();
        $pointRedemption->agent_id = $agent_id;
        $pointRedemption->points = $points;
        $pointRedemption->status = 'in_progress';
        $pointRedemption->tds = $tds;
        $pointRedemption->amount_to_be_paid = $amountToBePaid;
        $pointRedemption->save();

        $data = $this->points($request);

        return response([
            'status' => true,
            'data' => $data,
            'message' => 'Points redeemed successfully'
        ]);
    }

    public function points($request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        if (empty($startDate)) {
            $startDate = Carbon::now()->firstOfMonth();
        } else {
            $startDate = Carbon::createFromFormat('d-m-Y', $startDate)->startOfDay();
        }

        if (empty($endDate)) {
            $endDate = Carbon::now();
        } else {
            $endDate = Carbon::createFromFormat('d-m-Y', $endDate)->endOfDay();
        }
        $agent_id =  auth()->guard('api')->user()->id;


        $royalData = Policy::whereBetween('policy_start_date', [$startDate, $endDate])
            ->where('agent_id', $agent_id)
            ->select('policy_no', 'policy_start_date', 'policy_end_date', 'customername', 'premium', 'agent_commission', 'insurance_company')
            ->get();



        $totalAgentCommission = Policy::whereBetween('policy_start_date', [$startDate, $endDate])
            ->where('agent_id', $agent_id)
            ->sum('agent_commission');

        $totalInProgressCommission = PointRedemption::where('agent_id', $agent_id)
            ->where('status', 'in_progress')
            ->sum('points');


        $totalCompletedCommission = PointRedemption::whereBetween('created_at', [$startDate, $endDate])
            ->where('agent_id', $agent_id)
            ->where('status', 'completed')
            ->sum('points');

        $total = Policy::where('agent_id', $agent_id)
            ->sum('agent_commission');

        $reedeemPoints = PointRedemption::where('agent_id', $agent_id)
            ->whereIn('status', ['in_progress', 'completed'])
            ->sum('points');


        $remainingPoints = $total - $reedeemPoints;

        return  $data = [
            'remaining_points' => $remainingPoints,
            'total_points' => $totalAgentCommission,
            'total_completed_reedeem' => $totalCompletedCommission,
            'total_in_progress_reedeem' => $totalInProgressCommission,
            'policy' => $royalData,
        ];
    }
}
