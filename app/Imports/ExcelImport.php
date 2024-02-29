<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Policy;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\Models\Transaction;

class ExcelImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        $existingRecord = Policy::firstOrNew([
            'policy_no' => $row['policy_no'],
            'insurance_company' => $row['insurance_company'],
        ]);

        // Convert policy_start_date and policy_end_date from Excel serial number to date
        $existingRecord->policy_start_date = $this->excelSerialToDate($row['policy_start_date']);
        $existingRecord->policy_end_date = $this->excelSerialToDate($row['policy_end_date']);

        $existingRecord->fill([
            'policy_no' => $row['policy_no'] ?? null,
            'payment_by' => isset($row['payment_by']) ? strtoupper($row['payment_by']) : null,
            'customername' => $row['customername'] ?? null,
            'insurance_company' => $row['insurance_company'] ?? null,
            'agent_id' => $row['agent_id'] ?? null,
            'premium' => $row['premium'] ?? null,
            'gst' => isset($row['premium']) ? $row['premium'] * 0.1525 : null,
            'agent_commission' => isset($row['agent_id']) ? getCommission($row['agent_id'], $row['premium']) : null,
            'net_amount' => isset($row['premium']) ? $row['premium'] - $row['premium'] * 0.1525 : null,
        ]);

        $existingRecord->save();

        return $existingRecord;
    }

    public function headingRow(): int
    {
        return 1;
    }

    private function excelSerialToDate($excelSerialNumber)
    {
        $unixTimestamp = ($excelSerialNumber - 25569) * 86400;
        return date("Y-m-d", $unixTimestamp);
    }
}
