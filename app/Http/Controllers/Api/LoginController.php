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
        if (empty($request->password) && (empty($request->email)) )  {
            return response()->json(['message' => 'Password and email missing' , 'status' => false , 'data' => []], 400);
        }

        elseif(empty($request->email)) {
            return response()->json(['message' => 'Email missing' ,'status' => false , 'data' => []], 400);
        }

            elseif(empty($request->password)) {
                return response()->json(['message' => 'Password missing', 'status' => false , 'data' => []], 400);
            }
        
        
            $credentials = $request->only('email', 'password');
            $emailCredentials = $credentials;
            $mobileCredentials = [
                'mobile_number' => $credentials['email'], // Assuming 'email' field contains either email or mobile number
                'password' => $credentials['password']
            ];
            
            if (Auth::guard('agent')->attempt($emailCredentials) || Auth::guard('agent')->attempt($mobileCredentials)) {
                
            $user = Auth::guard('agent')->user();
            if(!$user->status) {
                return response()->json(['message' => 'your account is not active' , 'status' => false , 'data' => []], 400);
            }
            $record['name']=$user->name;
            $record['email']=$user->email;
            // $record['passwprd']=$user->password;
            $record['state']=$user->state;
            $record['city']=$user->city;
            $record['address']=$user->address;
            $record['mobile_number']=$user->mobile_number;
            // $record['status']=$user->status;
            $record['commission']=$user->commission;
            
            $token=   $user->createToken('MyApp')-> accessToken; 
            
       return response([
        'status' => true,
        'data' => $record,'token'=>$token,8000
    ]);

        }

        return response()->json(['message' => 'User not found' , 'status' => false , 'data' => []]);
    } catch (\Exception $e) {
        return response()->json(['message' => $e->getMessage() , 'status' => false , 'data' => [] ], 500);
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


