<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Commission;
use App\Imports\ExcelImport;
use App\Models\Policy;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use PhpOffice\PhpSpreadsheet\Writer\Pdf;
use Carbon\Carbon;

class AgentController extends Controller
{
    public function Agent(Request $request)
    {
        if ($request->isMethod('get')) {
            return view('admin.agent');
        } elseif ($request->isMethod('post')) {
            $validate = $request->validate([
                'name' => 'required|string|max:100',
                'mobile_number' => 'required|regex:/^[0-9]{10}$/',
            ]);

            // Create a new agent instance
            $agent = new Agent();
            $agent->name = $request->name;
            $agent->email = $request->email;
            $agent->password = $request->mobile_number;
            $agent->state = $request->state;
            $agent->city = $request->city;
            $agent->address = $request->address;
            $agent->mobile_number = $request->mobile_number;
            $agent->save();

            return redirect()->route('agent.commission', ['id' => $agent->id])->with('success', 'Agent created successfully.');
        }
    }

    public function AgentList(Request $request)
    {

        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if (empty($start_date)) {
            $start_date = now()->startOfMonth();
        } else {
            $start_date = Carbon::parse($start_date)->startOfDay();
        }

        if (empty($end_date)) {
            $end_date = now()->endOfDay();
        } else {
            $end_date = Carbon::parse($end_date)->endOfDay();
        }
    
        $users = Agent::with(['commissions', 'Policy' => function ($query) use ($start_date, $end_date) {
            $query->whereBetween('policy_start_date', [$start_date, $end_date]);
        }])->orderBy('created_at', 'desc')->get();

        return view('admin.user', ['data' => $users]);
    }

    public function filtereddata(Request $request)
    {
        // return "abs";
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if (empty($start_date)) {
            $start_date = now()->startOfDay();
        } else {
            $start_date = Carbon::parse($start_date)->startOfDay();
        }
        if (empty($end_date)) {
            $end_date = now()->endOfDay();
        } else {
            $end_date = Carbon::parse($end_date)->endOfDay();
        }
        $data = Agent::whereBetween('created_at', [$start_date, $end_date])
            ->get();

        return view('admin.user',  compact('data'));
    }

    public function commission(Request $request, $id)
    {

        $data = $id ? Agent::find($id) : new Agent();


        if ($data === null) {
            return redirect()->route('admin.user')->with('error', 'Agent not found');
        }

        $commissiondata = Commission::where('agent_id', $data->id)->get();

        if ($request->isMethod('post')) {

            $request->validate([
                'commission.*' => 'required',
                'commission_type.*' => 'required|in:fixed,percentage',
            ]);

            Commission::where('agent_id', $data->id)->delete();

            $commissions = $request->input('commission');
            $commissionTypes = $request->input('commission_type');

            foreach ($commissions as $key => $commissionValue) {
                $commission = new Commission();
                $commission->agent_id = $data->id;
                $commission->commission_type = $commissionTypes[$key];
                $commission->commission = $commissionValue;
                $commission->save();
            }
            return redirect()->route('agent.list')->with('success', 'Commission added successfully');
        }
        return view('admin.commission', compact('data', 'commissiondata'));
    }



    public function AgentEdit(Request $request, string $id)
    {
        if ($request->isMethod('post')) {

            $validate = $request->validate([
                'name' => 'required|string|max:100',
                'mobile_number' => 'required|regex:/^[0-9]{10}$/',
            ]);

            $agent = Agent::find($id);
            $agent->name = $request->name;
            $agent->email = $request->email;
            $agent->state = $request->state;
            $agent->city = $request->city;
            $agent->address = $request->address;
            $agent->mobile_number = $request->mobile_number;
            $agent->save();
            return redirect()->route('agent.list')->with('success', 'Update successfully.');
        } else {
            $agent = Agent::find($id);
            return view('admin.useredit', ['data' => $agent]);
        }
    }

    public function updateagentid(Request $request, $royalsundaram_id = null, $agent_id = null)
    {

        $royal = Policy::find($royalsundaram_id);

        if (!$royal) {
            return redirect()->back()->with('error', 'Royalsundaram record not found.');
        }

        if (!empty($agent_id)) {

            $agent = Agent::find($agent_id);
            $commissions = Commission::where('agent_id', $agent_id)->get();

            if ($commissions->isEmpty()) {
                return redirect()->route('agent.commission', $agent_id)->with('error', 'Update Commission of ' . $agent->name);
            }
            if ($request->isMethod('post')) {
                $commissionid = $request->commission_id;
                $commission = Commission::find($commissionid);

                if ($commission->commission_type == 'percentage') {
                    $commissionPercentage = $commission->commission;
                    $netAmount = $royal->net_amount;
                    $commissionAmount = $netAmount * ($commissionPercentage / 100);
                    $royal->agent_commission = $commissionAmount;
                } else {
                    $royal->agent_commission = $commission->commission;
                }
                $royal->agent_id = $agent_id;
            }


            if ($request->isMethod('get')) {
                if (count($commissions) == 1) {

                    if ($commissions[0]->commission_type == 'percentage') {
                        $commissionPercentage = $commissions[0]->commission;
                        $netAmount = $royal->net_amount;
                        $commissionAmount = $netAmount * ($commissionPercentage / 100);
                        $royal->agent_commission = $commissionAmount;
                    } else {
                        $royal->agent_commission = $commissions[0]->commission;
                    }
                    $royal->agent_id = $agent_id;
                } else {
                    return view('admin.selectcommission', compact('commission', 'agent', 'royal'));
                }
            }

            // $transation = Transaction::where('policy_id', $royal->id)->first();
            // $transation->agent_id = $agent_id;
            // $transation->save();
        }
        if ($request->hasFile('policy_file')) {

            $file = $request->file('policy_file');
            $customFileName = $royal->policy . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('public/policy', $customFileName);
            $royal->policy_link = $customFileName;
        }
        $royal->save();


        return redirect()->route('policy.list')->with('success', 'Agent and Policy updated successfully!');
    }
}
