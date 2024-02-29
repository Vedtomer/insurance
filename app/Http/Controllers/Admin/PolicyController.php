<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\ExcelImport;
use App\Models\Policy;
use App\Models\Agent;
use Illuminate\Support\Facades\Storage;


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
        $users = Policy::with('agent')->orderBy('id', 'desc')->get();
        $data = Agent::all();
        return view('admin.policy_list', ['data' => $users, 'dat' => $data]);
    }

    public function policyUpload(Request $request){

        if ($request->isMethod('get')) {
            return view('admin.policy_pdf_upload');
        }
    
        $validator = Validator::make($request->all(), [
            'pdfFile.*' => 'required|mimes:pdf',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        foreach($request->file('pdfFile') as $key => $file)
        {
            $fileName = $file->getClientOriginalName(); // Use the original filename
            Storage::disk('public')->put('policy/' . $fileName, file_get_contents($file));
            $files[]['name'] = $fileName;
        }
        
        return redirect()->back()->with('success', 'Data imported successfully!');
    }
}
