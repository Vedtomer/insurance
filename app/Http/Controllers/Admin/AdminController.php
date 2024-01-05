<?php

namespace App\Http\Controllers\Admin;

use App\Models\Agent;
use App\Models\User;

// use App\Models\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use DataTables;
use App\Models\Shriramgi;
use App\Models\Royalsundaram;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;
use App\Imports\ExcelImport1;
use App\Imports\ExcelImport2;
use Illuminate\Support\Facades\Storage;
// use App\Imports\ExcelImport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Transaction;



class AdminController extends Controller
{


    public function login(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->route('admin.dashboard');
        }

        if ($request->isMethod('get')) {
            return view('admin.login');
        }


        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('admin')->attempt($credentials)) {
                return redirect()->intended(route('admin.dashboard'));
            }

            return redirect()->route('admin.login')
                ->with('error', 'Invalid login credentials');
        }
        return redirect()->route('admin.login')->with('error', 'Invalid login credentials');
    }


    public function logout()
    {
        $guard = Auth::getDefaultDriver(); // Get the default guard

        Auth::guard($guard)->logout();

        $redirectRoute = ($guard == 'admin') ? 'admin.login' : 'agent.login';

        return redirect()->route($redirectRoute);
    }


    public function dashboard()
    {
        // Retrieve the authenticated admin
        $admin = Auth::guard('admin')->user();

        // You can now use $admin to access the authenticated admin's details

        return view('admin.dashboard', compact('admin'));
    }
    public function userdata()
    {
        // return view('admin.userdata');
        $userdata = DB::table('users')->get();
        return view('admin.userdata', ['data' => $userdata]);
    }


    public function userstore(Request $request)
    {
        $validate = $request->validate([

            'name' => 'required|string|max:100',  // validate krna form ko
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',

        ]);


        $userdata = new User();
        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->password = $request->password; // store kr raha hai yani database me data insert ho raha hai

        $userdata->save();

        return redirect()->route('userdata');
    }

    public function newview(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->get();
        return view('admin.newview', ['data' => $userdata]);
    }

    public function edit(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->first();
        return view('admin.newedit', ['data' => $userdata]);
    }

    public function newupdate(Request $request, $id)
    {
        $USER = DB::table('users')->where('id', $id)->update([

            'name' => $request->name,
            'email' => $request->email,


        ]);
        return redirect()->route('userdata')->with('error', 'update successfully.');
        // ]);
    }

    public function header()
    {
        return view('admin.header');
    }


    public function delete(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->delete();
        return redirect()->route('userdata');
    }



    public function showChangePasswordForm()
    {
        return view('admin.change-password');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required|',
            'new_password' => 'required|min:8|confirmed',
        ]);

        return redirect()->route('userdata')->with('success', 'Password changed successfully.');

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'The current password is incorrect.');
        }

        $user->update([
            'password' => bcrypt($request->new_password),
        ]);

        return redirect()->route('userdata')->with('success', 'Password changed successfully.');
    }

    public function newheader()
    {
        return view('admin.layout.main');
    }



    public function user()
    {
        $users = Agent::orderBy('created_at', 'desc')->get();

        return view('admin.user', ['data' => $users]);
    }

    public function useradd()
    {
        return view('admin.useradd');
    }
    public function usersave(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:agent',
            'password' => 'required|min:8',
            // 'state' => 'string|max:255',
            // 'city' => 'string|max:255',
            // 'address' => 'string|max:255',
            'mobile_number' => 'required|string|max:10|min:10',
            'commission' => 'required|string',
            'commission_type' => 'required|in:fixed,percentage', // ENUM ke liye 'in' rule ka istemal kiya gaya hai
            // ENUM ke liye 'in' rule ka istemal kiya gaya hai
        ]);


        $userdata = new Agent();
        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->password = ($request->password);
        $userdata->state = $request->state;
        $userdata->city = $request->city;



        $userdata->address = $request->address;
        $userdata->mobile_number = $request->mobile_number;
        $userdata->commission = $request->commission;
        $userdata->commission_type = $request->commission_type;


        $userdata->save();

        session()->flash('success', 'Agent created successfully.');
        return redirect()->route('admin.user');
    }

    //     public function displayUsers()
    // {
    //     $users = Agent::all(); // Sabhi users ki data fetch karein

    //     // return view('admin.user', ['data' => $users]);
    //     return view('admin.user', ['data' => $users]);
    // }
    // public function displayUsers()
    // {
    //     $users = User::all();
    //     dd($users); // Check karne ke liye
    //     // return view('admin.user', ['data' => $users]);
    // }


    public function useredit(string $id)
    {
        $userdata = DB::table('agent')->where('id', $id)->first();
        return view('admin.useredit', ['data' => $userdata]);
    }

    public function userupdate(Request $request, $id)
    {
        $USER = DB::table('agent')->where('id', $id)->update([

            'name' => $request->name,
            'email' => $request->email,
            'state' => $request->state,
            'city' => $request->city,
            'address' => $request->address,
            'mobile_number' => $request->mobile_number,
            'commission' => $request->commission,
            'commission_type' => $request->commission_type,


        ]);
        return redirect()->route('admin.user')->with('success', 'update successfully.');
        // ]);
    }
    public function userdelete(string $id)
    {
        $userdata = DB::table('agent')->where('id', $id)->delete();
        return redirect()->route('admin.user');
    }


    public function showForm()
    {
        return view('admin.excel');
    }

    // public function uploadExcel(Request $request)
    // {
    //     $request->validate([
    //         'excelFile' => 'required|mimes:xlsx,xls',
    //     ]);

    //     // $file = $request->file('file');
    //     $items = $request->file('excelFile')->store('temp');

    //      Excel::import(new ExcelImport1, $items);
    //     // Excel::import(new ExcelImport, 'path/to/your/excel/file.xlsx', null, \Maatwebsite\Excel\Excel::XLSX);


    //     return redirect()->back()->with('success', 'Data imported successfully!');
    // }

    public function uploadExcel(Request $request)
    {
        $request->validate([
            'excelFile' => 'required|mimes:xlsx,xls',
            'importType' => 'required|in:ExcelImport1,ExcelImport2',
        ]);



        // Decide which ExcelImport class to use based on the selected import type
        if ($request->importType == 'ExcelImport1') {
            $importClass = new ExcelImport1;
        } elseif ($request->importType == 'ExcelImport2') {
            $importClass = new ExcelImport2;
        }

        // Store the uploaded file and import using the selected ExcelImport class
        $items = $request->file('excelFile')->store('temp');
        Excel::import($importClass, $items);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }


    // public function excel()
    // {
    //     return view('admin.excel');
    // }


    // public function importExcel()
    // {
    //     Excel::import(new ExcelImport, 'path/to/your/excel/file.xlsx');

    //     return redirect()->back()->with('success', 'Data imported successfully!');
    // }
    // public function excelfile(Request $request){
    //     $validatedData = $request->validate([

    //         'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'

    //     ]);
    //     // dd($request->all());  
    //     $USER = new ();


    //     $USER->image = $request->file('image')->store('public/storage');


    //     $USER->save();
    //     // return $USER;
    //     return redirect()->route('into');
    // }

    public function royalsundaram(Request $request)
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

        $users = Royalsundaram::with('agent', 'transaction')->orderBy('id', 'desc')->get();


        $data = Agent::all();

        return view('admin.royalsundaram', ['data' => $users, 'dat' => $data]);
    }

    public function updatetransaction(Request $request ,$transaction_id){
    //    return $request;
    $user = Transaction::find($transaction_id);
    if ($request->isMethod('post')) {
        $user->payment_by = $request->payment_by;
        $user->is_payment_done = $request->is_payment_done;
        $user->is_agent_paid_premium_amount = $request->is_agent_paid_premium_amount;
        if($request->is_agent_paid_premium_amount == 1){
            $user->is_payment_done = 1;
        }
        $user->save();
        return redirect (route('royalsundaram'));
    }


       
        return view('admin.updatetransaction', ['data' => $user]);
    }


    // public function updateagentid(Request $request,  $royalsundaram_id=null , $agent_id=null)
    // {
    //     //  return $request;
    //   $royal = Royalsundaram::find($royalsundaram_id);
    //   if(!empty($agent_id)){
    //     $royal ->agent_id = $agent_id;
    //   }

    //   $royal ->save();
    //     return redirect()->back()->with('success', 'Agent update  successfully!');

    // }


    public function updateagentid(Request $request, $royalsundaram_id = null, $agent_id = null)
    {
        // return $request;
        $royal = Royalsundaram::find($royalsundaram_id);

        if (!$royal) {
            return redirect()->back()->with('error', 'Royalsundaram record not found.');
        }

        if (!empty($agent_id)) {
             $agent = Agent::find($agent_id);
            if ($agent->commission_type == 'percentage') {
                $commissionPercentage = $agent->commission;
                $netAmount = $royal->net_amount;
                $commissionAmount = $netAmount * ($commissionPercentage / 100);
                $royal->agent_commission = $commissionAmount;
            }else{
                $royal->agent_commission = $agent->commission;
            }
            $royal->agent_id = $agent_id;
        }
        if ($request->hasFile('policy_file')) {
            $file = $request->file('policy_file');
            $customFileName = $royal->policy . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/policy', $customFileName);
            $royal->policy_link = $customFileName;
        }

        $royal->save();

        return redirect()->back()->with('success', 'Agent and Policy updated successfully!');
    }
    // public function uploadPolicy(Request $request, $royalsundaram_id)
    // {
    //     $request->validate([
    //         'policy_file' => 'required|mimes:pdf,doc,docx', // Adjust the file types as needed
    //     ]);

    //     $royal = Royalsundaram::find($royalsundaram_id);

    //     if ($royal) {
    //         // Save the file to storage or perform other necessary operations
    //         $file = $request->file('policy_file');
    //         $file->storeAs('policy_links', $file->getClientOriginalName(), 'public');

    //         // Update the policy_link in Royalsundaram
    //         $royal->policy_link = 'policy_links/' . $file->getClientOriginalName();
    //         $royal->save();

    //         return redirect()->back()->with('success', 'Policy uploaded successfully!');
    //     }

    //     // Handle the case where Royalsundaram is not found
    //     return redirect()->back()->with('error', 'Royalsundaram record not found.');
    // }
    // return view('admin.updateagentid', [
    //     'agent_id' => $agent_id,
    //     'royalsundaram_id' => $royalsundaram_id,

    // ]);
    //     public function royalsundaram(Request $request, $userId)
    // {

    //     // $user = User::with('agent')->find($userId);

    //     $users = Royalsundaram::all();
    //     return view('admin.royalsundaram', ['data' => $users);
    // }

    // public function royalsundaramsave(request $request){
    //     $validate = $request->validate([
    //         'name' => 'required|string|max:100',
    //         'email' => 'required|email|unique:agent',
    //         'password' => 'required|min:8',
    //         'state' => 'required|string|max:255',
    //         'city' => 'required|string|max:255',
    //         'address' => 'required|string|max:255',
    //         'mobile_number' => 'required|string|max:20',
    //         'commission' => 'required|string',
    //         'commission_type' => 'required|in:fixed,percentage', // ENUM ke liye 'in' rule ka istemal kiya gaya hai
    //         // ENUM ke liye 'in' rule ka istemal kiya gaya hai
    //     ]);


    //     $userdata = new Agent();
    //     $userdata->name = $request->name;
    //     $userdata->email = $request->email;
    //     $userdata->password = ($request->password); // Password ko encrypt karna mat bhoolen
    //     $userdata->state = $request->state;
    //     $userdata->city = $request->city;



    //     $userdata->address = $request->address;
    //     $userdata->mobile_number = $request->mobile_number;
    //     $userdata->commission = $request->commission;
    //     $userdata->commission_type = $request->commission_type;


    //     $userdata->save();

    //     session()->flash('success', 'Agent created successfully.');
    //     return redirect()->route('admin.royalsundaram');
    // }
    public function shriramgi(Request $request)
    {

        if ($request->ajax()) {
            $data = Shriramgi::select('*');
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '<a href="shriramgiedit" class="edit btn btn-primary btn-sm">View</a><a href="excel" class="edit btn btn-info btn-sm">update</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.shriramgi');
    }

    // public function shriramgi(Request $request)
    // {
    //         if ($request->ajax()) {
    //             $data = Shriramgi::select('*');
    //             return Datatables::of($data)
    //                     ->addIndexColumn()
    //                     ->addColumn('action', function($row){

    //                             $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';

    //                             return $btn;
    //                     })
    //                     ->rawColumns(['action'])
    //                     ->make(true);
    //         }

    //         return view('admin.shriramgi');
    //     }





    // public function shriramgiedit()
    // {
    //     $users = Shriramgi::all();
    //     return view('admin.shriramgiedit', ['dataa' => $users]);
    // }
    public function shriramgiedit()
    {
        // $user = Shriramgi::find();

        // if (!$user) {
        //     abort(404); // Yadi user not found ho, toh 404 error throw karein
        // }
        $users = Shriramgi::all();

        return view('admin.shriramgiedit', ['data' => $users]);
    }



    public function shriramgiupdate(Request $request)
    {
        $validate = $request->validate([

            'sno' => 'required|string|max:100',
            'proposal_no' => 'required|string|max:100',
            'policy_no' => 'required|string|max:100',
            'branch_code' => 'required|string|max:100',
            'branch_name' => 'required|string|max:100',
            'proposal_reg_date' => 'required|string|max:100',
            'policy_issuance_date' => 'required|string|max:100',
            'policy_start_date' => 'required|string|max:100',
            'policy_end_date' => 'required|string|max:100',
            'product_name' => 'required|string|max:100',
            'product_class' => 'required|string|max:100',
            'cust_name' => 'required|string|max:100',
            'insured_name' => 'required|string|max:100',
            'business_source' => 'required|string|max:100',
            // 'agent_name'=> 'required|string|max:100',
            // 'exec_name'=> 'required|string|max:100',
            // 'broker_name'=> 'required|string|max:100',
            // 'fiancier_type'=> 'required|string|max:100',
            // 'veh_code'=> 'required|string|max:100',
            // 'veh_model_make'=> 'required|string|max:100',
            // 'reg_no'=> 'required|string|max:100',
            // 'veh_engine_no'=> 'required|string|max:100',
            // 'veh_chas_no'=> 'required|string|max:100',
            // 'veh_fst_regn_dt'=> 'required|string|max:100',
            // 'veh_pur_dt'=> 'required|string|max:100',
            // 'gvw'=> 'required|string|max:100',
            // 'seat_capcty_y'=> 'required|string|max:100',
            // 'idv_amoun_t'=> 'required|string|max:100',
            // 'social_others_s'=> 'required|string|max:100',
            // 'locality'=> 'required|string|max:100',
            // 'ncb_perct'=> 'required|string|max:100',
            // 'policy_status'=> 'required|string|max:100',
            // 'gross_premium'=> 'required|string|max:100',
            // 'igst_amount'=> 'required|string|max:100',
            // 'sgst_amount'=> 'required|string|max:100',
            // 'cgst_amount'=> 'required|string|max:100',

            // 'net_premium'=> 'required|string|max:100',
            'agent_id' => 'required|string|max:100',


            // ENUM ke liye 'in' rule ka istemal kiya gaya hai
            // ENUM ke liye 'in' rule ka istemal kiya gaya hai
        ]);


        $userdata = new Shriramgi();
        $userdata->sno = $request->sno;
        $userdata->proposal_no = $request->proposal_no;
        $userdata->policy_no = $request->policy_no;
        $userdata->branch_code = $request->branch_code;
        $userdata->branch_name = $request->branch_name;
        $userdata->proposal_reg_date = $request->proposal_reg_date;
        $userdata->policy_issuance_date = $request->policy_issuance_date;
        $userdata->policy_start_date = $request->policy_start_date;
        $userdata->policy_end_date = $request->policy_end_date;
        $userdata->product_name = $request->product_name;
        $userdata->product_class = $request->product_class;
        $userdata->cust_name = $request->cust_name;
        $userdata->insured_name = $request->insured_name;
        $userdata->business_source = $request->business_source;
        // $userdata->agent_name = $request->agent_name;
        // $userdata->exec_name = $request->exec_name;
        // $userdata->broker_name = $request->broker_name;
        // $userdata->fiancier_type = $request->fiancier_type;
        // $userdata->veh_code = $request->veh_code;
        // $userdata->veh_model_make = $request->veh_model_make;
        // $userdata->reg_no = $request->reg_no;
        // $userdata->veh_engine_no = $request->veh_engine_no;
        // $userdata->veh_chas_no = $request->veh_chas_no;
        // $userdata->veh_fst_regn_dt = $request->veh_fst_regn_dt;
        // $userdata->veh_pur_dt = $request->veh_pur_dt;
        // $userdata->gvw = $request->gvw;
        // $userdata->seat_capcty_y = $request->seat_capcty_y;
        // $userdata->idv_amoun_t = $request->idv_amoun_t;
        // $userdata->social_others_s = $request->social_others_s;
        // $userdata->locality = $request->locality;
        // $userdata->ncb_perct = $request->ncb_perct;
        // $userdata->policy_status = $request->policy_status;
        // $userdata->gross_premium = $request->gross_premium;
        // $userdata->igst_amount = $request->igst_amount;
        // $userdata->sgst_amount = $request->sgst_amount;
        // $userdata->cgst_amount = $request->cgst_amount;
        // $userdata->net_premium = $request->net_premium;
        $userdata->agent_id = $request->agent_id;



        $userdata->save();

        session()->flash('success', 'Agent created successfully.');
        return redirect()->route('admin.shriramgiedit');
    }




    public function royalsundaramedit()
    {
        $users = Shriramgi::all();
        return view('admin.royalsundaram', ['dataa' => $users]);
    }

    public function royalsundaramupdate(Request $request)
    {
        $validate = $request->validate([

            'branch' => 'required|string|max:100',
            'userid' => 'required|string|max:100',
            'policy' => 'required|string|max:100',
            'prody666yhuct' => 'required|string|max:100',
            'covernotenumber' => 'required|string|max:100',
            'covernoteissuedate' => 'required|string|max:100',
            'creationdate' => 'required|string|max:100',
            'lastmodifiedby' => 'required|string|max:100',
            'lastmodifiedtime' => 'required|string|max:100',
            'businessstatus' => 'required|string|max:100',
            'policyholder' => 'required|string|max:100',
            'oacode' => 'required|string|max:100',
            'inceptiondate' => 'required|string|max:100',
            'expirydate' => 'required|string|max:100',
            'make' => 'required|string|max:100',
            'model' => 'required|string|max:100',
            'chassisno' => 'required|string|max:100',
            'engineno' => 'required|string|max:100',
            'registrationnumber' => 'required|string|max:100',
            'contractnumber' => 'required|string|max:100',
            'policypremium' => 'required|string|max:100',
            'idv' => 'required|string|max:100',
            'loading' => 'required|string|max:100',
            'oddiscount' => 'required|string|max:100',
            'covpremium' => 'required|string|max:100',
            'ncd' => 'required|string|max:100',
            'assettype' => 'required|string|max:100',
            'vehicle_inspection_report' => 'required|string|max:100',
            'inspection_date' => 'required|string|max:100',
            'service_providername' => 'required|string|max:100',
            'vir_number' => 'required|string|max:100',
            'fraud_indicator' => 'required|string|max:100',
            'fraud_reason' => 'required|string|max:100',
            'receipt_number' => 'required|string|max:100',
            'policy_type' => 'required|string|max:100',
            'enginecapacity' => 'required|string|max:100',
            'engine_capacity_slab' => 'required|string|max:100',
            'vehicle_fuel_type' => 'required|string|max:100',
            'vehicleage' => 'required|string|max:100',
            'vehicle_slab' => 'required|string|max:100',
            'business_type' => 'required|string|max:100',
            'channel' => 'required|string|max:100',
            'agent_id' => 'required|string|max:100',


            // ENUM ke liye 'in' rule ka istemal kiya gaya hai
            // ENUM ke liye 'in' rule ka istemal kiya gaya hai
        ]);


        $userdata = new Royalsundaram();
        $userdata->branch = $request->branch;
        $userdata->userid = $request->userid;
        $userdata->policy = $request->policy;
        $userdata->prody666yhuct = $request->prody666yhuct;
        $userdata->covernotenumber = $request->covernotenumber;
        $userdata->covernoteissuedate = $request->covernoteissuedate;
        $userdata->creationdate = $request->creationdate;
        $userdata->lastmodifiedby = $request->lastmodifiedby;
        $userdata->lastmodifiedtime = $request->lastmodifiedtime;
        $userdata->businessstatus = $request->businessstatus;
        $userdata->policyholder = $request->policyholder;
        $userdata->oacode = $request->oacode;
        $userdata->inceptiondate = $request->inceptiondate;
        $userdata->expirydate = $request->expirydate;
        // $userdata->make = $request->make;
        // $userdata->model = $request->model;
        // $userdata->chassisno = $request->chassisno;
        // $userdata->engineno = $request->engineno;
        // $userdata->registrationnumber = $request->registrationnumber;
        // $userdata->contractnumber = $request->contractnumber;
        // $userdata->policypremium = $request->policypremium;
        // $userdata->idv = $request->idv;
        // $userdata->loading = $request->loading;
        // $userdata->oddiscount = $request->oddiscount;
        // $userdata->covpremium = $request->covpremium;
        // $userdata->ncd = $request->ncd;
        // $userdata->assettype = $request->assettype;
        // $userdata->vehicle_inspection_report = $request->vehicle_inspection_report;
        // $userdata->inspection_date = $request->inspection_date;
        // $userdata->service_providername = $request->service_providername;
        // $userdata->vir_number = $request->vir_number;
        // $userdata->fraud_indicator = $request->fraud_indicator;
        // $userdata->fraud_reason = $request->fraud_reason;
        // $userdata->receipt_number = $request->receipt_number;
        // $userdata->policy_type = $request->policy_type;
        // $userdata->enginecapacity = $request->enginecapacity;
        // $userdata->engine_capacity_slab = $request->engine_capacity_slab;
        // $userdata->vehicle_fuel_type = $request->vehicle_fuel_type;
        // $userdata->vehicleage = $request->vehicleage;
        // $userdata->vehicle_slab = $request->vehicle_slab;
        // $userdata->business_type = $request->business_type;
        // $userdata->channel = $request->channel;

        $userdata->agent_id = $request->agent_id;



        $userdata->save();

        session()->flash('success', 'Agent created successfully.');
        return redirect()->route('admin.royalsundaramedit');
    }
    public function result()
    {
        return view('admin.result');
    }
    public function profile()
    {
        return view('admin.profile');
    }

    public function  transaction()
    {
        $users = Transaction::orderBy('id','desc')->get();

        return view('admin.transaction', ['data' => $users]);
    }
    public function  home()
    {
        return view('admin.home');
    }
    public function  newhome()
    {
        return view('admin.layout.newhome');
    }
    // public function view(){


    // }
    // public function view()
    // {
    //     $userdata = DB::table('users')->get();
    //     $data = ['data' => $userdata];

    //     // Check if $userdata is not null and is an array
    //     if (!is_null($userdata) && is_array($userdata) && count($userdata) > 0) {
    //         return view('userdata', $data);
    //     } else {
    //         // If no data, return a view without the table
    //         return view('userdata', $data);
    //     }
    // }


    //     sudo apt install php-fpm php-mbstring php-bcmath php-xml php-mysql php-common php-gd php-cli php-curl php-zip php-gd

    // Use it: php /usr/local/bin/composer
    //
}
