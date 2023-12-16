<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

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

    public function getPoliciesCount($polices=null)
    {
        try {
            if ($polices == 'royalsundaram') {
                $agentsData = Royalsundaram::where('agent_id', $this->id)->select('agent_id', 'policy as policy_no')->first();
            } else {
                $agentsData = Shriramgi::where('agent_id', $this->id)->select('agent_idd', 'policy_no')->first();
            }
    
            if ($agentsData) {
                return response()->json([
                    'policy_no' => $agentsData->policy_no,
                    
                ]);
            } else {
                return response()->json(['error' => 'Agent not found'], 404);
            }
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
