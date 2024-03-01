<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\File;

use function PHPUnit\Framework\returnSelf;

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

        $data = ('/policies') . "/" . $this->policy_no . '.pdf';

        if (Storage::disk('public')->has($data)) {
            return asset('/policies') . "/" . $this->policy_no . '.pdf';
        } else {
            return "no";
        }
    }
}
