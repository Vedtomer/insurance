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
    protected $importDate;

    public function __construct($importDate)
    {
        $this->importDate = $importDate;
    }

    public function model(array $row)
    {
        $existingRecord = Policy::firstOrNew([
            'policy_no' => $row['policy_no'],
            'insurance_company' => $row['insurance_company'],
        ]);

     
        $existingRecord->policy_start_date = Carbon::parse($this->importDate);
        $existingRecord->policy_end_date = Carbon::parse($this->importDate)->addYear();

        $existingRecord->fill([
            'policy_no' => $row['policy_no'] ?? null,
            'payment_by' => isset($row['payment_by']) ? strtoupper(trim($row['payment_by'])) : null,
            'customername' => $row['customername'] ?? null,
            'insurance_company' => isset($row['insurance_company']) ? trim($row['insurance_company']) : null,
            'agent_id' => isset($row['commission_code']) ? getAgentId($row['commission_code']) : null,
            'premium' => $row['premium'] ?? null,
            'gst' => isset($row['premium']) ? $row['premium'] * 0.1525 : null,
            'agent_commission' => isset($row['commission_code']) ? getCommission($row['commission_code'], $row['premium']) : null,
            'net_amount' => isset($row['premium']) ? $row['premium'] - $row['premium'] * 0.1525 : null,
        ]);

        $existingRecord->save();

        return $existingRecord;
    }

    public function headingRow(): int
    {
        return 1;
    }

}
