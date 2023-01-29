<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AdminAccounts;
use Illuminate\Http\Request;

class AdminHomePageController extends Controller
{
    public function view(Request $request)
    {
        $session = session()->all();

        // dd($session['Admin_data']);

        $admin_data = AdminAccounts::find($session['Admin_data']);
        dd($admin_data->email);
        return view('admin-directory.admin-screens.view-home-page')->with('message',"Welcome rdtdsrtrytrtydrgsdfhdtudtugtibt7n");

    }



}
