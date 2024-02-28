<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\ExcelImport;
use App\Models\Policy;
use App\Models\Agent;

use Maatwebsite\Excel\Facades\Excel;

class PolicyController extends Controller
{
    public function upload(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.upload');
        }

        $validator = Validator::make($request->all(), [
            'excelFile' => 'required|mimes:xlsx,xls',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $importClass = new ExcelImport;
        $items = $request->file('excelFile')->store('temp');
        Excel::import($importClass, $items);
        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function PolicyList(Request $request)
    {
        // return $id;
        // if ($request->ajax()) {
        //     $data = Royalsundaram::select('*');
        //     return Datatables::of($data)
        //         ->addIndexColumn()
        //         ->addColumn('action', function ($row) {

        //             $btn = '<a href="Royalsundaramedit ,$user->id" class="edit btn btn-primary btn-sm">View</a>';

        //             return $btn;
        //         })
        //         ->rawColumns(['action'])
        //         ->make(true);
        // }
        //     $user = User::with('agent')->find($userId);

        $users = Policy::with('agent')->orderBy('id', 'desc')->get();
        $data = Agent::all();
        return view('admin.policy_list', ['data' => $users, 'dat' => $data]);
    }
}
