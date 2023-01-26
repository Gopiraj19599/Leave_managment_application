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
        $validated = $request->validate([
            'username_email' => 'required',
            'password' => 'required',
            'login_type' => 'required'
        ]);

        return redirect('/view-home-page');


    }
}
