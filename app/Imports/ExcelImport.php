<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\Policy;

class ExcelImport implements ToModel
{
    public function model(array $row)
    {
        return new Policy([
            'agent_name'     => $row[0],
            'count_of_net'    => $row[1],
            'sum_of_incoming'  => $row[2],
        'sum_of_given_amount'  => $row[3],
           
        ]);
    }
    
}

