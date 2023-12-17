<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shriramgi extends Model
{
    use HasFactory;
    protected $table = 'shriramgi'; 
    protected $fillable = [

        'policy_link',
        'sno',
        'proposal_no',
        'policy_no',
        'branch_code',
        'branch_name',
        'proposal_reg_date',
        'policy_issuance_date',
        'policy_start_date',
        'policy_end_date',
        'product_name',
        'product_class',
        'cust_name',
        'insured_name',
        'business_source',
        'agent_name',
        'exec_name',
        'broker_name',
        'fiancier_type',
        'veh_code',
        'veh_model_make',
        'reg_no',
        'veh_engine_no',
        'veh_chas_no',
        'veh_fst_regn_dt',
        'veh_pur_dt',
        'gvw',
        'seat_capcty_y',
        'idv_amoun_t',
        'social_others_s',
        'locality',
        'ncb_perct',
        'policy_status',
        'gross_premium',
        'igst_amount',
        'sgst_amount',
        'cgst_amount',

        'net_premium',
        'agent_id',
        'agent_commission'
       
    ];
}
