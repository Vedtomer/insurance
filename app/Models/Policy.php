<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policy extends Model
{
    use HasFactory;
    protected $fillable = [
        'policy_no',
        'policy_start_date',
        'policy_end_date',
        'customername',
        'insurance_company',
        'agent_id',
        'premium',
        'gst',
        'agent_commission',
        'net_amount',
        'payment_by'
        // Add other attributes here if needed
    ];
    protected $appends = ['policy_link'];
    public function agent()
    {
        return $this->belongsTo(Agent::class, 'agent_id', 'id');
    }

    public function getPolicyLinkAttribute()
    {
        // Replace 'policy_link' with the logic to generate the link
        // For example, you can concatenate attributes to generate a link
        return 'http://example.com/policies/' . $this->id;
    }
   
}
