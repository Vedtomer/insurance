<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\ExcelImport;
use App\Models\Policy;
use App\Models\Agent;
use Illuminate\Support\Facades\Log;
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
                $uniqueName = $originalName. '.' . $extension;
    
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
