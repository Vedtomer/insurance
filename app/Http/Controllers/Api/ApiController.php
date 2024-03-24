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
    public function index()
    {
        $dummyData = [
            'total_commission' => 1500.00,
            // 'current_month_commission' => 500.00,
            'total_policy' => 100,
            // 'current_month_policy' => 20,
            'total_premium_paid' => 5000.00,
            'pending_premium' => 1500.00,
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

            $totalInProgressCommission = PointRedemption::whereBetween('created_at', [$startDate, $endDate])
                ->where('agent_id', $agent_id)
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

            $data=[
                'remaining_points' => $remainingPoints,
                'total_points' => $totalAgentCommission,
                'total_completed_reedeem' => $totalCompletedCommission,
                'total_in_progress_reedeem' => $totalInProgressCommission,
                'policy' => $royalData,
            ];

            return response([
                'status' => true,
                'data' => $data,
                'message' => 'Points History'
            ]);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
