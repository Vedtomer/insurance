<?php


namespace App\Http\Controllers\Api;
use DB;
use Validator;
use App\Models\Agent;
use App\Imports\ExcelImport;
use Illuminate\Http\Request;


use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Models\Shriramgi;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{


    public function agentlogin(Request $request)
    {
        try {
            $email = $request->input('email');
            $password = $request->input('password');
    
            if (empty($password) || empty($email)) {
                return response()->json(['message' => 'Password or email missing', 'status' => false, 'data' => []], 400);
            }
    
            $credentials = $request->only('email', 'password');
            $emailCredentials = $credentials;
            $mobileCredentials = [
                'mobile_number' => $email,
                'password' => $password
            ];
    
            if (Auth::guard('agent')->attempt($emailCredentials) || Auth::guard('agent')->attempt($mobileCredentials)) {
                $user = Auth::guard('agent')->user();
                if (!$user->status) {
                    return response()->json(['message' => 'Your account is not active', 'status' => false, 'data' => []], 400);
                }
    
                $record = [
                    'name' => $user->name,
                    'email' => $user->email,
                    'state' => $user->state,
                    'city' => $user->city,
                    'address' => $user->address,
                    'mobile_number' => $user->mobile_number,
                    'commission' => [],
                ];
    
                // Format commissions
                foreach ($user->commissions as $commission) {
                    $formattedCommission = '';
    
                    if ($commission->commission_type === 'percentage') {
                        $formattedCommission = $commission->commission . '%';
                    } elseif ($commission->commission_type === 'fixed') {
                        $formattedCommission =  $commission->commission. '₹';
                    }
    
                    $record['commission'][] = $formattedCommission;
                }
    
                $token = $user->createToken('MyApp')->accessToken;
    
                return response()->json([
                    'status' => true,
                    'data' => $record,
                    'token' => $token
                ], 200);
            }
    
            return response()->json(['message' => 'User not found', 'status' => false, 'data' => []], 404);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage(), 'status' => false, 'data' => []], 500);
        }
    }
    


public function agentlogout()
{
    
    try {
        auth()->guard('api')->user()->tokens()->delete();
        return response()->json(['message' => 'Logout successfully', 'status' => true , 'data' => []], 200);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

public function getPolicy(Request $request)
{
    // return $request;
    try {
        $agent = new Agent();
        $result = $agent->getPoliciesCount($request);
        return $result;
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}



}


