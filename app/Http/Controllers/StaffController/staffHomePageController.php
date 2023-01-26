<?php

namespace App\Http\Controllers\StaffController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class staffHomePageController extends Controller
{
    public function view()
    {

        return view('staff-directory.StaffScreen.homePage');

    }



}
