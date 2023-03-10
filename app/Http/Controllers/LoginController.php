<?php

namespace App\Http\Controllers;

use App\Models\AdminAccounts;
use App\Models\UserAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function Login()
    {
        return view('login');
    }

    // public function post(Request $request)
    // {

    //     $validated = $request->validate([
    //         'email' => 'required',
    //         'password' => 'required',
    //         'login_type' => 'required'
    //     ]);

    //     $type = $request->login_type;
    //     $email = $request->email;
    //     $password = $request->password;

    //     if ($type == 'staff') {
    //         $variable = UserAccounts::where('email', $email)->first();

    //         if (isset($variable->email) and $password == $variable->password) {
    //             $request->session()->put('Staff_data',$variable->id);
    //             return redirect()->route('Staff-view-home');
    //         } else {
    //             return redirect()->route('login')->with('message', 'Staff email have no account, pls try proper email and password');
    //         }
    //     } else {
    //         $variable = AdminAccounts::where('email', $email)->first();
    //         if (isset($variable->email) and $password == $variable->password) {

    //             $request->session()->put('Admin_data',$variable->id);
    //             return redirect()->route('view-home');
    //         } else {
    //             return redirect()->route('login')->with('message', 'Admin email have no account pls try proper email and password');
    //         }
    //     }
    // }

    public function post(Request $request)
    {
        $validated = $request->validate([
                    'email' => 'required',
                    'password' => 'required',
                    'login_type' => 'required'
                ]);
// dd($request->password);
        $value =array(
           'email'=>$request->email,
           'password'=>$request->password

        );

        if ($request->login_type == "admin") {
            $user =AdminAccounts::where('email',$request->email);
            Auth::login($user,true);
            return view('demo');
        }
    }


    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/');
    }
}
