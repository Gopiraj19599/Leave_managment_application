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
        if (isset($session['Admin_data'])){

            $admin_data = AdminAccounts::find($session['Admin_data']);

            return view('admin-directory.admin-screens.view-home-page')->with('admin_data', $admin_data);
        }else{

            return redirect('/')->with('message','You was logout pls login again');

        }



    }



}
