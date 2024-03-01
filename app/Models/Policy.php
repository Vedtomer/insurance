<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;
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
        



        $data = asset('/storage/policies') . "/" . $this->policy_no . '.pdf';
        if (File::exists($data)) {
            return $data;
        } else {
           
            return "";
        }
   
    }
   
}
// }