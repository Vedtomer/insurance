<?php

namespace App\Http\Controllers\Admin;


use DataTables;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Shriramgi;
use App\Models\Commission;
use App\Models\Transaction;
use App\Models\Agent;
use Illuminate\Http\Request;
use App\Models\Royalsundaram;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


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
        $guard = Auth::getDefaultDriver();
        Auth::guard($guard)->logout();
        $redirectRoute = ($guard == 'admin') ? 'admin.login' : 'agent.login';
        return redirect()->route($redirectRoute);
    }


    public function dashboard(Request $request)
    {
        $start_date = $request->input('start_date', "") ===  "null"  ? "" : $request->input('start_date');
        $end_date = $request->input('end_date', "") ===  "null"  ? "" : $request->input('end_date');
        $agent_id = $request->input('agent_id', "") === "null" ? "" : $request->input('agent_id', "");

        if ($start_date !== null) {
            $start_date = Carbon::parse($start_date)->startOfDay();
        } else {
            $start_date = now()->startOfMonth();
        }
    
        if ($end_date !== null) {
            $end_date = Carbon::parse($end_date)->endOfDay();
        } else {
            $end_date = now()->endOfDay();
        }

        $admin = Auth::guard('admin')->user();

        $query = Agent::with(['Policy' => function ($query) use ($start_date, $end_date) {
            $query->whereBetween('policy_start_date', [$start_date, $end_date]);
        }])->orderBy('created_at', 'desc');
        
        // if (!empty($agent_id)) {
        //     $query->where('id', $agent_id);
        // }
        
        $data = $query->get();
        $agent = Agent::get();
        
        return view('admin.dashboard', compact('admin' , 'data' , 'agent'));
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

            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',

        ]);

        // POLICY COUNT , premium , PENDDING premium , POINTS , 
        $userdata = new User();
        $userdata->name = $request->name;
        $userdata->email = $request->email;
        $userdata->password = $request->password;

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

    public function userdelete(string $id)
    {
        $userdata = DB::table('agent')->where('id', $id)->delete();
        return redirect()->route('admin.user');
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

    public function updatetransaction(Request $request, $transaction_id)
    {
        //    return $request;
        $user = Transaction::find($transaction_id);
        if ($request->isMethod('post')) {
            $user->payment_by = $request->payment_by;
            $user->is_payment_done = $request->is_payment_done;
            $user->is_agent_paid_premium_amount = $request->is_agent_paid_premium_amount;
            if ($request->is_agent_paid_premium_amount == 1) {
                $user->is_payment_done = 1;
            }
            $user->save();
            return redirect(route('royalsundaram'));
        }

        return view('admin.updatetransaction', ['data' => $user]);
    }


    public function royalsundaramedit($id)
    {
        // $users = Shriramgi::all();
        $users = Royalsundaram::find($id);
        return view('admin.royalsundaramedit', ['data' => $users]);
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



    public function Transaction(Request $request, $id = null)
{
    
    $start_date = $request->input('start_date', now()->startOfMonth());
    $end_date = $request->input('end_date', now()->endOfDay());
    $payment_mode = ($request->input('payment_mode') === 'null') ? '' : $request->input('payment_mode');

    $agent_id =($request->input('agent_id') === 'null') ? '' : $request->input('agent_id'); 
    
    if (empty($start_date) || $start_date == "null") {
        $start_date = now()->startOfMonth();
    } else {
        $start_date = Carbon::parse($start_date)->startOfDay();
    }

    if (empty($end_date) || $end_date == "null") {
        $end_date = now()->endOfDay();
    } else {
        $end_date = Carbon::parse($end_date)->endOfDay();
    }

    $query = Transaction::whereBetween('created_at', [$start_date, $end_date])->orderBy('created_at', 'desc');

    if (!empty($payment_mode) ) {
       
        if ($payment_mode === 'cash') {
            $query->where('payment_mode', 'cash');
        } else {
            $query->where('payment_mode',"!=", 'cash');
        }
    }

    if (!empty($agent_id) ) {
        $query->where('agent_id', $agent_id);
    }

    $users = $query->get();
    $agents = Agent::all();

    return view('admin.transaction', ['data' => $users, 'agent' => $agents]);
}




    public function AddTransaction(Request $request)
    {
        if ($request->isMethod('get')) {
            $agents = Agent::orderBy('created_at', 'desc')->get();
            return view('admin.transactionadd', ['data' => $agents]);
        }

        if ($request->isMethod('post')) {
            $transaction = new Transaction();
            $transaction->agent_id = $request->agent_id;
            $transaction->payment_mode = $request->payment_mode;
            $transaction->transaction_id = $request->transaction_id;
            $transaction->amount = $request->amount;
            $transaction->payment_date = $request->payment_date;
            $transaction->save();
            return redirect()->route('transaction')->with('success', 'Transaction Add Successfully.');
        }
    }

    public function  home()
    {
        return view('admin.home');
    }
    public function  newhome()
    {
        return view('admin.layout.newhome');
    }
}
