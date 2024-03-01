<?php

namespace App\Models;

use PHPUnit\TextUI\Configuration\File;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        // if(!Storage::exists(asset('/storage/policies')."/".$this->policy_no.'.pdf')) {


            // echo "not exists";
            // return "";
            //  return 'http://127.0.0.1:8001/admin/policies/' . $this->policy_no.".pdf.pdf"; 

        // }else{

        //  return   $data = asset('/storage/policies')."/".$this->policy_no.'.pdf';
    //   if( Storage::exists( asset('/storage/policies')."/".$this->policy_no.'.pdf')){



         $data =  asset('/storage/policies')."/".$this->policy_no.'.pdf';
         if(File::exists($data)){
            return $data;
         }else{
            return "";
         }
       
    //   }

       
        // if (!file_exists($fileExists)) {
        //  echo $fileExists ;
    //    return "The file does not exist.";
    //    }
    //  else {
        
    //    return false;
        // return $fileExists ;
    //    }
    }
   
}
// }