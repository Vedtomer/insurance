<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Royalsundaram;
use Illuminate\Support\Facades\Log;

class ExcelImport1 implements ToModel , WithHeadingRow
{
    public function model(array $row)
    {
        Log:info($row);
        return new Royalsundaram([
     

        'branch'=> $row['branch'], 
        'userid'=> $row['userid'], 
        'policy'=> $row['policy'], 
        'prody666yhuct'=> $row['prody666yhuct'], 
        'covernotenumber'=> $row['covernotenumber'], 
        'covernoteissuedate'=> $row['covernoteissuedate'], 
        'creationdate'=> $row['creationdate'], 
        'lastmodifiedby'=> $row['lastmodifiedby'], 
        'lastmodifiedtime'=> $row['lastmodifiedtime'], 
        'businessstatus'=> $row[ 'businessstatus'], 
        'policyholder'=> $row['policyholder'], 
        'oacode'=> $row['oacode'], 
        'inceptiondate'=> $row['inceptiondate'], 
        'expirydate'=> $row['expirydate'], 
        'make'=> $row['make'], 
        'model'=> $row['model'], 
        'chassisno'=> $row['chassisno'], 
        'engineno'=> $row['engineno'], 
        'registrationnumber'=> $row['registrationnumber'], 
        'contractnumber'=> $row['contractnumber'], 
        'policypremium'=> $row['policypremium'], 
        'idv'=> $row['idv'], 
        'loading'=> $row['loading'], 
        'oddiscount'=> $row['oddiscount'], 
        'covpremium'=> $row['covpremium'], 
        'ncd'=> $row['ncd'], 
        'assettype'=> $row['assettype'], 
        'vehicle_inspection_report'=> $row['vehicle_inspection_report'], 
        'inspection_date'=> $row['inspection_date'], 
        'service_providername'=> $row['service_providername'], 
        'vir_number'=> $row['vir_number'], 
        'fraud_indicator'=> $row['fraud_indicator'], 
        'fraud_reason'=> $row['fraud_reason'], 
        'receipt_number'=> $row['receipt_number'], 
        'policy_type'=> $row['policy_type'], 
        'enginecapacity'=> $row['enginecapacity'], 
        'engine_capacity_slab'=> $row['engine_capacity_slab'], 
        'vehicle_fuel_type'=> $row['vehicle_fuel_type'], 
        'vehicleage'=> $row['vehicleage'], 
        'vehicle_slab'=> $row['vehicle_slab'], 
        'business_type'=> $row['business_type'], 
        'channel'=> $row['channel'],
        // 'agent_id'=> $row['agent_id'],
           
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }
    
}

