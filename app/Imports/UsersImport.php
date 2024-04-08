<?php

namespace App\Imports;

use App\Models\Agent;
use App\Models\Policy;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Hash;
class UsersImport implements ToModel 
{
    
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
       public function model(array $row)
    {
        return new Agent([
            'id' => $row['0'],
            'name' => $row['1'],
            'email' => $row['2'],
            'password' => Hash::make($row[3]),
            'state' => $row['4'],
            'city' => $row['5'],
            'address' => $row['6'],
            'mobile_number' => $row['7'],
            'status' => $row['8'],
            'commission_id' => $row['9'],
           
        ]);
       
    }
    
}
