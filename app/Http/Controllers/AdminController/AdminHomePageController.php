<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomePageController extends Controller
{
    public function view()
    {

        return view('admin-directory.admin-screens.view-home-page');

    }



}