<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\Royalsundaram;
Use App\Models\Slider;

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
}
