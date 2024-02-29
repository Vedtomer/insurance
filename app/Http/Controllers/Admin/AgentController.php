<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agent;
use App\Models\Commission;
use App\Models\Policy;
use Illuminate\Support\Str;

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

    public function AgentList()
    {
    return   $users = Agent::with('commissions')->orderBy('created_at', 'desc')->get();

        return view('admin.user', ['data' => $users]);
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
            $commission = Commission::where('agent_id', $agent_id)->get();
            if (empty($agent->commission)) {
                return redirect()->route('admin.commission', $agent->id)->with('error', 'Update Commission of ' . $agent->name);
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
                if (count($commission) == 1) {

                    if ($commission[0]->commission_type == 'percentage') {
                        $commissionPercentage = $commission[0]->commission;
                        $netAmount = $royal->net_amount;
                        $commissionAmount = $netAmount * ($commissionPercentage / 100);
                        $royal->agent_commission = $commissionAmount;
                    } else {
                        $royal->agent_commission = $commission[0]->commission;
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
