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
        $start_date = $request->input('start_date', null);
        $end_date = $request->input('end_date', null);
        $agent_id = $request->input('agent_id', null);
    
        $start_date = $start_date ? Carbon::parse($start_date)->startOfDay() : now()->startOfMonth();
        $end_date = $end_date ? Carbon::parse($end_date)->endOfDay() : now()->endOfDay();
    
        $query = Policy::with('agent')->whereBetween('policy_start_date', [$start_date, $end_date])->orderBy('id', 'desc');
    
        if ($agent_id) {
            $query->where('agent_id', $agent_id);
        }
    
        $data = $query->get();
        $agents = Agent::get();
    
        return view('admin.policy_list', ['data' => $data, 'agents' => $agents]);
    }
    

    // public function  policyshow( Request $request ,string $id){
    //     if ($request->isMethod('get')) {
    //     return view('admin.policyshow');
    //     }

    //     if ($request->isMethod('post')){
    //       $users = Agent::with('commissions', 'Policy')->orderBy('created_at', 'desc')->get();
    //     }
    // }

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
