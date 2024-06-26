<?php

namespace App\Http\Controllers\Api;

use Twilio\Rest\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Slider;
use App\Models\Agent;
use App\Models\Policy;
use Carbon\Carbon;
use App\Models\PointRedemption;
use Illuminate\Support\Facades\DB;

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
            //->whereBetween('created_at', [$startDate, $endDate])
            ->sum('amount');

        $pendingPremium = Policy::where('payment_by', 'self')
            ->where('agent_id', $agent_id)
           // ->whereBetween('policy_start_date', [$startDate, $endDate])
            ->sum('premium');

            $totalCommissionpendingPremium = Policy::where('agent_id', $agent_id)
            //->whereBetween('policy_start_date', [$startDate, $endDate])
            ->sum('agent_commission');

        if ($cutAndPayTrue) {
            $pendingPremium = $pendingPremium - ($transaction + $totalCommissionpendingPremium);
        } else {
            $pendingPremium = $pendingPremium - $transaction;
        }


        $dummyData = [
            'total_commission' => round($totalCommission),
            'total_policy' => $totalPolicy,
            'total_premium_paid' => round($totalPremiumPaid),
            'pending_premium' => round($pendingPremium),
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
                'cut_and_pay' => auth()->guard('api')->user()->cut_and_pay,
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


        // $whatsapp = $this->sendWhatsAppMessage($points, $agent->name);

        return response([
            'status' => true,
            'data' => $data,

            // 'whatsapp' => $whatsapp,
            'message' => 'Points redeemed successfully'
        ]);
    }

    public function sendWhatsAppMessage($points, $agent)
    {
        try {
            $sid    = env('TWILIO_SID');
            $token  = env('TWILIO_AUTH_TOKEN');
            $twilio = new Client($sid, $token);

            $messageBody = "$agent requested redeem of $points points.";

            $message = $twilio->messages
                ->create(
                    "whatsapp:+919802244899",
                    array(
                        "from" => "whatsapp:+14155238886",
                        "body" => $messageBody
                    )
                );

            // print($message->sid);
            return response()->json(['message' => 'WhatsApp message sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
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

        // $total = Policy::where('agent_id', $agent_id)
        //     ->sum('agent_commission');

        $reedeemPoints = PointRedemption::where('agent_id', $agent_id)
            ->whereIn('status', ['in_progress', 'completed'])
            ->sum('points');


        $remainingPoints = $totalAgentCommission - $reedeemPoints;

        return  $data = [
            'remaining_points' => $remainingPoints,
            'total_points' => $totalAgentCommission,
            'total_completed_reedeem' => $totalCompletedCommission,
            'total_in_progress_reedeem' => $totalInProgressCommission,
            'policy' => $royalData,
        ];
    }

    public function PointsLedger(Request $request)
    {
        try {
            $startDate = $request->start_date ? Carbon::createFromFormat('d-m-Y', $request->start_date)->startOfDay() : Carbon::now()->firstOfMonth();
            $endDate = $request->end_date ? Carbon::createFromFormat('d-m-Y', $request->end_date)->endOfDay() : Carbon::now();
            $agentId = auth()->guard('api')->user()->id;

            $currentMonthStart = $startDate->copy()->startOfMonth();

            // Calculate the opening balance for the previous month
            $openingBalance = Policy::where('agent_id', $agentId)
                ->where('policy_start_date', '<', $currentMonthStart)
                ->sum('agent_commission');

            // Calculate the sum of redeemed points for the previous month
            $redeemPoints = PointRedemption::where('agent_id', $agentId)
                ->whereIn('status', ['in_progress', 'completed'])
                ->where('created_at', '<', $currentMonthStart)
                ->sum('points');

            $openingBalance -= $redeemPoints;

            // Create an array for the opening balance
            $openingBalanceRecord = (object) [
                'date' => $currentMonthStart->copy()->startOfMonth()->toDateString(),
                'opening_balance' => $openingBalance,
            ];

            $policies = DB::table('policies')
                ->whereBetween('policy_start_date', [$startDate, $endDate])
                ->where('agent_id', $agentId)
                ->select(
                    'policy_no',
                    DB::raw('DATE(policy_start_date) as date'), // Change the date format
                    'customername',
                    'agent_commission as credit',
                    DB::raw('NULL as debit'),
                    DB::raw('NULL as tds'),
                    DB::raw('NULL as status') // Adding status column with NULL value
                )
                ->get();

            // Retrieve point_redemptions for debit
            $debitRedemptions = DB::table('point_redemptions')
                ->where('agent_id', $agentId)
                ->whereIn('status', ['in_progress', 'completed'])
                ->whereBetween('created_at', [$startDate, $endDate])
                ->select(
                    DB::raw('NULL as policy_no'),
                    DB::raw('DATE(created_at) as date'), // Change the date format
                    DB::raw('NULL as customername'),
                    DB::raw('NULL as credit'),
                    'amount_to_be_paid as debit',
                    DB::raw('NULL as tds'),
                    'status' // Adding status column
                )
                ->get();

            // Set status to NULL or 0 for policies
            foreach ($policies as $policy) {
                $policy->status = null;
            }

            // Retrieve point_redemptions for tds
            $tdsRedemptions = DB::table('point_redemptions')
            ->whereBetween('created_at', [$startDate, $endDate])
            ->where('agent_id', $agentId)
            ->whereIn('status', ['in_progress', 'completed'])
            ->select(
                DB::raw('NULL as policy_no'),
                DB::raw('DATE(created_at) as date'), // Change the date format
                DB::raw('NULL as customername'),
                DB::raw('NULL as credit'),
                DB::raw('NULL as debit'),
                DB::raw('CAST(tds AS CHAR) as tds'), // Cast tds to string
                'status' // Adding status column
            )
            ->get();

            // Set status to NULL or 0 for policies
            foreach ($tdsRedemptions as $tdsRedemption) {
                $tdsRedemption->status = null;
            }

            // Merge records and prepend the opening balance record
            $combinedRecords = collect([$openingBalanceRecord])->concat($policies)->concat($debitRedemptions)->concat($tdsRedemptions);

            // Sort the merged collection by ascending date
            $sortedRecords = $combinedRecords->sortBy('date');

            // Calculate balance for each record and round off
            $balance = $openingBalance;
            $sortedRecords = $sortedRecords->map(function ($record) use (&$balance) {
                if (isset($record->opening_balance)) {
                    $record->balance = round($record->opening_balance);
                } else {
                    $balance += isset($record->credit) ? $record->credit : 0;
                    $balance -= isset($record->debit) ? $record->debit : 0;
                    $balance -= isset($record->tds) ? $record->tds : 0;
                    $record->balance = round($balance);
                }
                return $record;
            });

            $sortedRecords = $sortedRecords->values();

            return response()->json([
                'status' => true,
                'data' => $sortedRecords,
                'message' => 'Ledger retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while fetching the ledger data.'
            ], 500);
        }
    }



    public function PendingPremiumLedger(Request $request)
    {
        try {
            $startDate = $request->start_date ? Carbon::createFromFormat('d-m-Y', $request->start_date)->startOfDay() : Carbon::now()->firstOfMonth();
            $endDate = $request->end_date ? Carbon::createFromFormat('d-m-Y', $request->end_date)->endOfDay() : Carbon::now();
            $agent = auth()->guard('api')->user();
            $agentId = $agent->id;
            $cutAndPay = $agent->cut_and_pay ?? 0;

            $currentMonthStart = $startDate->copy()->startOfMonth();

            // Calculate the opening balance for the previous month
                 $submitBalance = Transaction::where('agent_id', $agentId)
                ->where('payment_date', '<', $currentMonthStart)
                ->sum('amount');

            // Calculate the sum of pending premium for the previous month
                $pendingAmount = Policy::where('agent_id', $agentId)
            ->where('payment_by', "SELF")
            ->where('policy_start_date', '<', $currentMonthStart)
            ->selectRaw('SUM(premium) as premium_total, SUM(agent_commission) as commission_total')
            ->first();


            $openingBalance = $pendingAmount['premium_total'] - $submitBalance;

            if($cutAndPay){
                $openingBalance = $pendingAmount['premium_total']- $pendingAmount['commission_total'] - $submitBalance;
            }

            // Retrieve policies
            $policies = DB::table('policies')
                ->whereBetween('policy_start_date', [$startDate, $endDate])
                ->where('agent_id', $agentId)
                ->where('payment_by', "SELF")
                ->select(
                    'policy_no',
                    DB::raw('DATE(policy_start_date) as date'),
                    'customername',
                    'premium',
                    'agent_commission'
                )
                ->get();

            // Retrieve transactions
            $transactions = Transaction::where('agent_id', $agentId)
                ->whereBetween('payment_date', [$startDate, $endDate])
                ->select(
                    DB::raw('payment_date as date'),
                    'amount as credit'
                )
                ->get();

            $combinedRecords = $policies->merge($transactions);

            $sortedRecords = $combinedRecords->sortBy('date');

            $balance = $openingBalance;

            $sortedRecords = $sortedRecords->map(function ($record) use (&$balance, $cutAndPay) {
                if (isset($record->opening_balance)) {
                    $record->balance = round($record->opening_balance);
                } else {
                    if ($cutAndPay == 1) {
                        $balance += isset($record->premium) ? $record->premium : 0;
                        $balance -= isset($record->credit) ? $record->credit : 0;
                        $balance -= isset($record->agent_commission) ? $record->agent_commission : 0;
                    } else {
                        $balance += isset($record->premium) ? $record->premium : 0;
                        $balance -= isset($record->credit) ? $record->credit : 0;
                    }
                    $record->balance = round($balance);
                }
                return $record;
            });

            $openingBalanceRecord = (object) [
                'date' => $currentMonthStart->copy()->startOfMonth()->toDateString(),
                'opening_balance' => round($openingBalance),
            ];

            // Add the opening balance record to the beginning of the sorted records
            $sortedRecords->prepend($openingBalanceRecord);

            return response()->json([
                'status' => true,
                'data' => $sortedRecords->values()->all(),
                'message' => 'Pending premium ledger retrieved successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'An error occurred while fetching the pending premium ledger data.'
            ], 500);
        }
    }



}
