<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function Login()
    {
        return view('login');
    }


    public function post(Request $request)
    {

        // dd($request);
        $validated = $request->validate([
            'username_email' => 'required',
            'password' => 'required',
            'login_type' => 'required'
        ]);
          $type = $request->login_type;
        if ($type == 'staff'){
            return redirect('/Staff-view-home');
        }else{
            return redirect('/view-home-page');
        }




    }
}
