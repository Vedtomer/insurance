<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use App\Models\Agent;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
class AgentExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Agent::all();
        // return $this->getActionItems();
    }

    // public function headings(): array
    // {
    //     $columns = [
    //         'id',
    //         'name',
    //         'email',
    //         'password',
    //         'state',
    //         'city',
    //         'address',
    //         'mobile_number' ,
    //         'status',
    //         'commission_id',
    //     ];
    //     return $columns;
    // }

    // private function getActionItems()
    // {
    //     $select = 'id ,
    //     name,
    //     email,
    //     password,
    //     state,
    //     city,
    //     address,
    //     mobile_number ,
    //     status,
    //     commission_id';

    //     $query = DB::table('agents')->select(DB::raw($select));
    //     $query->whereNull('agents.created_at');

    //     $ai = $query->orderBy('id' ,'desc')->get();
    //     return $ai;
    // }
}
