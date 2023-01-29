<?php

namespace App\Http\Controllers;

use App\Models\AdminAccounts;
use App\Models\UserAccounts;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login()
    {
        return view('login');
    }

    public function post(Request $request)
    {



        $validated = $request->validate([
            'email' => 'required',
            'password' => 'required',
            'login_type' => 'required'
        ]);

        $type = $request->login_type;
        $email = $request->email;

        if ($type == 'staff') {
            $variable = UserAccounts::where('email', $email)->first();


            if (isset($variable->email)) {
                // \Session::put('Session_Type', 'Admin');
                return redirect()->route('Staff-view-home');
            } else {
                return redirect()->route('login')->with('message', 'Staff email have no account, pls try proper email');
            }
        } else {
            $variable = AdminAccounts::where('email', $email)->first();
            if (isset($variable->email)) {

                $request->session()->put('Admin_data',$variable->id);
                return redirect()->route('view-home');
            } else {
                return redirect()->route('login')->with('message', 'Admin email have no account pls try proper email');
            }
        }
    }
}
