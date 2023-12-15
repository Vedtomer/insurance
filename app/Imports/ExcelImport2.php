<?php

namespace App\Imports;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Models\Shriramgi;
use Illuminate\Support\Facades\Log;

class ExcelImport2 implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        Log:info($row);
        return new Shriramgi([
     
            'sno' => $row['sno'],
            'proposal_no'=> $row['proposal_no'],
            'policy_no' => $row['policy_no'],
            'branch_code'=> $row['branch_code'],
            'branch_name' => $row['branch_name'],
            'proposal_reg_date'=> $row['proposal_reg_date'], 
            'policy_issuance_date'=> $row['policy_issuance_date'], 
            'policy_start_date'=> $row['policy_start_date'], 
            'policy_end_date'=> $row['policy_end_date'], 
            'product_name'=> $row['product_name'], 
            'product_class'=> $row['product_class'], 
            'cust_name'=> $row['cust_name'], 
            'insured_name'=> $row['insured_name'], 
            'business_source'=> $row['business_source'], 
            'agent_name'=> $row['agent_name'], 
            'exec_name'=> $row['exec_name'], 
            'broker_name'=> $row['broker_name'], 
            'fiancier_type'=> $row['fiancier_type'], 
            'veh_code'=> $row['veh_code'], 
            'veh_model_make'=> $row['veh_model_make'], 
            'reg_no'=> $row['reg_no'], 
            'veh_engine_no'=> $row['veh_engine_no'], 
            'veh_chas_no'=> $row['veh_chas_no'], 
            'veh_fst_regn_dt'=> $row['veh_fst_regn_dt'], 
            'veh_pur_dt'=> $row['veh_pur_dt'], 
            'gvw'=> $row['gvw'], 
            'seat_capcty_y'=> $row['seat_capcty'], 
            'idv_amoun_t'=> $row['idv_amount'], 
            'social_others_s'=> $row['social_others'], 
            'locality'=> $row['locality'], 
            'ncb_perct'=> $row['ncb_perct'], 
            'policy_status'=> $row['policy_status'], 
            'gross_premium'=> $row['gross_premium'], 
            'igst_amount'=> $row['igst_amount'], 
            'sgst_amount'=> $row['sgst_amount'], 
            'cgst_amount'=> $row['cgst_amount'], 

            'net_premium'=> $row['net_premium'], 
           
        ]);
    }
    
// }




// use App\User;
// use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;

// class ExcelImport2 implements ToModel, WithHeadingRow
// {
//     public function model(array $row)
//     {

//         Log:info($row);


//         // return new Shriramgi([
//         //     'name'  => $row['name'],
//         //     'email' => $row['email'],
//         // ]);
//     }
    
    public function headingRow(): int
    {
        return 7;
    }
}