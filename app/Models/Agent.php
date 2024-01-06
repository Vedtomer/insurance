<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Commission;
use Illuminate\Support\Facades\Auth;
class Agent extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'agent';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'state',
        'city',
        'address',
        'mobile_number',
        'commission',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function commission()
    {
        return $this->belongsTo(Commission::class, 'id', 'agent_id');
    }

    public function getPoliciesCount($request = null)
    {
        try {
            $startDate = $request->start_date;
            $endDate = $request->end_date;

            // \Log::info('start_date: ' . $startDate);
            // \Log::info('end_date: ' . $endDate);
    
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
          
            $royalData = Royalsundaram::whereBetween('creationdate', [$startDate, $endDate])->where('agent_id', $agent_id) ->select('agent_id', 'policy as policy_no', 'creationdate as policy_start_date', 'expirydate as policy_end_date', 'policyholder as customername', 'policypremium as premium','agent_commission', 'policy_link')->get();
    
            $shriramData = Shriramgi::whereBetween('policy_start_date', [$startDate, $endDate])
                ->select('agent_id', 'policy_no', 'policy_start_date', 'policy_end_date', 'insured_name as customername', 'net_premium as premium','agent_commission')
                ->get();
    
            $combinedData = collect();
    
            foreach ($royalData as $royalItem) {

                \Log::info('Royal Item: ' . json_encode($royalItem));
    
                $combinedData->push([
                    'policy_link' => $royalItem->policy_link,
                    'policy_no' => $royalItem->policy_no,
                    'policy_start_date' => $royalItem->policy_start_date,
                    'policy_end_date' => $royalItem->policy_end_date,
                    'customername' => $royalItem->customername,
                    'premium' => $royalItem->premium,
                    'agent_commission' => $royalItem->agent_commission,
                    'insurance_company' => "Royal Sundaram",
                ]);
            }
    
            foreach ($shriramData as $shriramItem) {

                \Log::info('Shriram Item: ' . json_encode($shriramItem));
    
                $combinedData->push([
                    'policy_link' => $shriramItem->policy_link,
                    'policy_no' => $shriramItem->policy_no,
                    'policy_start_date' => $shriramItem->policy_start_date,
                    'policy_end_date' => $shriramItem->policy_end_date,
                    'customername' => $shriramItem->customername,
                    'premium' => $shriramItem->premium,
                    'agent_commission' => $royalItem->agent_commission,
                    'insurance_company' => "Shriram",
                ]);
            }
    
            \Log::info('Combined Data: ' . json_encode($combinedData));
    
            return response([
                'status' => true,
                'data' => $combinedData,
                'message' => 'Policy listing'
            ]);
        } catch (\Exception $e) {
 
            \Log::error('Exception: ' . $e->getMessage());

            return response()->json(['message' => $e->getMessage(), 'status' => false, 'data' => []], 500);
        }
    }
    





    // public function getPoliciesCount($request = null)
    // {
    //     //    return $request;

    //     try {
          
    //         $startDate = $request->start_date;
    //         $endDate = $request->end_date;

    //         if (empty($startDate)) {
    //             $startDate = Carbon::now()->firstOfMonth();
    //         } else {
    //             $startDate = Carbon::createFromFormat('d-m-Y', $startDate)->startOfDay();
    //         }

    //         if (empty($endDate)) {
    //             $endDate = Carbon::now();
    //         } else {
    //             $endDate = Carbon::createFromFormat('d-m-Y', $endDate)->endOfDay();
    //         }

    //         $royalData = Royalsundaram::where('agent_id',Auth::id())
    //             ->whereBetween('creationdate', [$startDate,$endDate])
    //             ->select('agent_id', 'policy as policy_no', 'creationdate as policy_start_date', 'expirydate as policy_end_date', 'policyholder as customername', 'policypremium as premium')
    //             ->get();

    //         $shriramData = Shriramgi::where('agent_id', Auth::id())
    //             ->whereBetween('policy_start_date', [$startDate, $endDate])
    //             ->select('agent_id', 'policy_no', 'policy_start_date', 'policy_end_date', 'insured_name as customername', 'net_premium as premium')
    //             ->get();

    //         $combinedData = collect();

    //         foreach ($royalData as $royalItem) {
    //             $combinedData->push([
    //                 // 'agent_id' => $royalItem->agent_id,
    //                 'policy_link' => $royalItem->policy_link,
    //                 'policy_no' => $royalItem->policy_no,
    //                 'policy_start_date' => $royalItem->policy_start_date,
    //                 'policy_end_date' => $royalItem->policy_end_date,
    //                 'customername' => $royalItem->customername,
    //                 'premium' => $royalItem->premium,
    //             ]);
    //         }

    //         foreach ($shriramData as $shriramItem) {
    //             $combinedData->push([
    //                 'policy_link' => $shriramItem->policy_link,
    //                 'policy_no' => $shriramItem->policy_no,
    //                 'policy_start_date' => $shriramItem->policy_start_date,
    //                 'policy_end_date' => $shriramItem->policy_end_date,
    //                 'customername' => $shriramItem->customername,
    //                 'premium' => $shriramItem->premium,
    //             ]);
    //         }

    //         // return $combinedData;
    //         return response([
    //             'status' => true,
    //             'data' => $combinedData,
    //             'message' => 'Policy listing'
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json(['message' => $e->getMessage(), 'status' => false, 'data' => []], 500);
    //     }
    // }
}
// shriramji => policy_start_date, policy_end_date,	insured_name as coustomername, net_premium as premium
// insured_name => 	policyholder, expirydate . creationdate ,policypremium
