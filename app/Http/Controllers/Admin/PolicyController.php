<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Agent;
use App\Models\Policy;
use App\Imports\ExcelImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;


use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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

        $importClass = new ExcelImport($request->date); 
        $items = $request->file('excelFile')->store('temp');
        Excel::import($importClass, $items);
        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function PolicyList(Request $request)
    {
        $start_date = $request->input('start_date', "") ===  "null"  ? "" : $request->input('start_date');
        $end_date = $request->input('end_date', "") ===  "null"  ? "" : $request->input('end_date');
       $agent_id = $request->input('agent_id', "") === "null" ? "" : $request->input('agent_id', "");

    
        $start_date = $start_date ? Carbon::parse($start_date)->startOfDay() : now()->startOfMonth();
        $end_date = $end_date ? Carbon::parse($end_date)->endOfDay() : now()->endOfDay();
    
        $query = Policy::with('agent')->whereBetween('policy_start_date', [$start_date, $end_date])->orderBy('id', 'desc');
    
        if (!empty($agent_id)) {
            $query->where('agent_id', $agent_id);
        }
    
        $data = $query->get();
        $agentData = Agent::get();
    
        return view('admin.policy_list', ['data' => $data, 'agentData' => $agentData]);
    }
    
    

  

    public function policyUpload(Request $request){

        if ($request->isMethod('get')) {
            return view('admin.policy_pdf_upload');
        }
    
        $successFiles = [];
        $failedFiles = [];
    
        try {
            $validator = Validator::make($request->all(), [
                'files.*' => 'required|mimes:pdf',
            ]);
            
    
            if ($validator->fails()) {
                throw new \Exception('One or more files are invalid.');
            }
    
            foreach ($request->file('files') as $file) {
                $originalName = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $uniqueName = $originalName;
    
                try {
                    $file->storeAs('public/policies', $uniqueName);
                    $successFiles[] = $originalName;
                } catch (\Exception $e) {
                    $failedFiles[$originalName] = $e->getMessage();
                }
            }
    
            return view('admin.policy_pdf_upload', compact('successFiles', 'failedFiles'));
        } catch (\Exception $e) {
            return redirect()->back()->withErrors([$e->getMessage()])->withInput();
        }
    }
    
}
