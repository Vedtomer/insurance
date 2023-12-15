<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;


// class Agent extends Model
// {
//     use HasFactory;
// }




class Agent extends Authenticatable
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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function getPoliciesCount($agentId , $polices)
{

    // $agentId = $request->input('agent_id');

    // Assuming you have a table named "shriramgi" with an "agent_id" field
    // $agentsData  = Shriramgi::where('agent_id', $agentId)->select('agent_id', 'policy_no')->first();
    // $agentsData = DB::table('shriramgi')->where('agent_id', $agentId)->first();
    if($polices == 'royalsundaram'){
        $agentsData = Royalsundaram::where('agent_id', $agentId)->select('agent_id', 'policy as policy_no')->first(); 
    }else{
        $agentsData = Shriramgi::where('agent_id', $agentId)->select('agent_id', 'policy_no')->first();  

    }
// dd($agentsData); die();
    if ($agentsData) {
        // Check if policies_count property exists before accessing it
        // $policiesCount = property_exists($agentsData, 'policy_no') ? $agentsData->policies_count : null;

        // return response()->json(['agent_id' => $agentId, 'policy_no' => $policiesCount]);
        return response()->json([
            'agent_id' => $agentId,
            'policy_no' => $agentsData->policy_no,
            // 'policies_count' => $policiesCount
        ]);

    }
    
    
    else {
        return response()->json(['error' => 'Agent not found'], 404);
    }
}
 



}
