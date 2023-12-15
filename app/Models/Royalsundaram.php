<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Royalsundaram extends Model
{
    use HasFactory;
    protected $table = 'royalsundaram'; 
    protected $fillable = [
       
        'branch', 
        'userid', 
        'policy', 
        'prody666yhuct', 
        'covernotenumber', 
        'covernoteissuedate', 
        'creationdate', 
        'lastmodifiedby', 
        'lastmodifiedtime', 
        'businessstatus', 
        'policyholder', 
        'oacode', 
        'inceptiondate', 
        'expirydate', 
        'make', 
        'model', 
        'chassisno', 
        'engineno', 
        'registrationnumber', 
        'contractnumber', 
        'policypremium', 
        'idv', 
        'loading', 
        'oddiscount', 
        'covpremium', 
        'ncd', 
        'assettype', 
        'vehicle_inspection_report', 
        'inspection_date', 
        'service_providername', 
        'vir_number', 
        'fraud_indicator', 
        'fraud_reason', 
        'receipt_number', 
        'policy_type', 
        'enginecapacity', 
        'engine_capacity_slab', 
        'vehicle_fuel_type', 
        'vehicleage', 
        'vehicle_slab', 
        'business_type', 
        'channel' ,
        'agent_id' 
       
    ];
}
