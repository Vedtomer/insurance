<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Royalsundaram;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Transaction;
class ExcelImport1 implements ToModel , WithHeadingRow
{
    public function model(array $row)
    {
        // Log:info($row);
        $existingRecord = Royalsundaram::firstOrNew(['policy' => $row['policy']]);


          $existingRecord->fill([
     

            'branch' => $row['branch'] ?? null,
            'userid' => $row['userid'] ?? null,
            'policy' => $row['policy'] ?? null,
            'prody666yhuct' => $row['prody666yhuct'] ?? null,
            'covernotenumber' => $row['covernotenumber'] ?? null,
            'covernoteissuedate' => $row['covernoteissuedate'] ?? null,
            'creationdate' => isset($row['creationdate']) ? Carbon::createFromFormat('d/m/Y H:i:s', $row['creationdate']) : null,
            'lastmodifiedby' => $row['lastmodifiedby'] ?? null,
            'lastmodifiedtime' => $row['lastmodifiedtime'] ?? null,
            'businessstatus' => $row['businessstatus'] ?? null,
            'policyholder' => $row['policyholder'] ?? null,
            'oacode' => $row['oacode'] ?? null,
            'inceptiondate' => $row['inceptiondate'] ?? null,
            'expirydate' => $row['expirydate'] ?? null,
            'make' => $row['make'] ?? null,
            'model' => $row['model'] ?? null,
            'chassisno' => $row['chassisno'] ?? null,
            'engineno' => $row['engineno'] ?? null,
            'registrationnumber' => $row['registrationnumber'] ?? null,
            'contractnumber' => $row['contractnumber'] ?? null,
            'policypremium' => $row['policypremium'] ?? null,
            'idv' => $row['idv'] ?? null,
            'loading' => $row['loading'] ?? null,
            'oddiscount' => $row['oddiscount'] ?? null,
            'covpremium' => $row['covpremium'] ?? null,
            'ncd' => $row['ncd'] ?? null,
            'assettype' => $row['assettype'] ?? null,
            'vehicle_inspection_report' => $row['vehicle_inspection_report'] ?? null,
            'inspection_date' => $row['inspection_date'] ?? null,
            'service_providername' => $row['service_providername'] ?? null,
            'vir_number' => $row['vir_number'] ?? null,
            'fraud_indicator' => $row['fraud_indicator'] ?? null,
            'fraud_reason' => $row['fraud_reason'] ?? null,
            'receipt_number' => $row['receipt_number'] ?? null,
            'policy_type' => $row['policy_type'] ?? null,
            'enginecapacity' => $row['enginecapacity'] ?? null,
            'engine_capacity_slab' => $row['engine_capacity_slab'] ?? null,
            'vehicle_fuel_type' => $row['vehicle_fuel_type'] ?? null,
            'vehicleage' => $row['vehicleage'] ?? null,
            'vehicle_slab' => $row['vehicle_slab'] ?? null,
            'business_type' => $row['business_type'] ?? null,
            'channel' => $row['channel'] ?? null,
            'gst' => isset($row['policypremium']) ? $row['policypremium'] * 0.1525 : null,
            'net_amount' => isset($row['policypremium']) ? $row['policypremium'] - $row['policypremium'] * 0.1525 : null,
            // 'agent_id'=> $row['agent_id'],
        ]);

    
        $existingRecord->save();
        
    $TransactionRecord = Transaction::firstOrNew(['policy_no' => $row['policy']]);


    $TransactionRecord->fill([

        'total_amount' => $row['policypremium'],
        'policy_no' => $row['policy'],
        'policy_id' => $existingRecord->id,
        'gst' => $row['policypremium'] * 0.1525,
        'net_amount'=> $row['policypremium'] - $row['policypremium'] * 0.1525,

    ]);
  
    $TransactionRecord->save();

    return $existingRecord;
    }

    public function headingRow(): int
    {
        return 1;
    }
    
}

