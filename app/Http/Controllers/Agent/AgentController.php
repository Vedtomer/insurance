<?php

// namespace App\Http\Controllers;
namespace App\Http\Controllers\Agent;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AgentController extends Controller
{
    //login
    public function login(Request $request)
    {
          if (Auth::guard('agent')->check()) {
            return redirect()->route('dashboard');
        }

        if ($request->isMethod('get')) {
            return view('login');
        }


        if ($request->isMethod('post')) {
            $credentials = $request->only('email', 'password');

            if (Auth::guard('agent')->attempt($credentials)) {
                return redirect()->intended(route('dashboard'));
            }

            return redirect()->route('login')
                ->with('error', 'Invalid login credentials');
                
        }
        return redirect()->route('login')->with('error', 'Invalid login credentials');
    }

    
    public function logout()
    {
        Auth::guard('agent')->logout();
        return redirect()->route('login'); // Change 'admin.login' to 'login'
    }
    
    public function dashboard()
    {
   
        $agent = Auth::guard('agent')->user();
   
        return view('agent.dashboard', compact('agent'));
    }
    // public function dashboard(){

    //     return view('dashboard');
    // }
    
    public function userdata()
    {
        // return view('admin.userdata');
        $userdata = DB::table('users')->get();
        return view('agent.userdata', ['data' => $userdata]);
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
        return view('agent.newview', ['data' => $userdata]);
    }

    public function edit(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->first();
        return view('agent.newedit', ['data' => $userdata]);
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
        return view('agent.header');
    }


    public function delete(string $id)
    {
        $userdata = DB::table('users')->where('id', $id)->delete();
        return redirect()->route('userdata');
    }



    public function showChangePasswordForm()
    {
        return view('agent.change-password');
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

    public function newheader(){
        return view('agent.layout.main');
    }
    public function user(){
        return view('agent.user');
    }

    public function usersave(Request $request)
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

        return redirect()->route('user');
    }

    public function result(){
        return view('agent.result');
    }
    public function profile(){
        return view('agent.profile');
    }

    public function  transaction(){
        return view('agent.transaction');
    }
    public function  home(){
        return view('agent.homes');
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
}
