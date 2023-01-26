<?php

namespace App\Http\Controllers\StaffController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function view()
    {

        return view('staff-directory.StaffScreen.setting');

    }



}
