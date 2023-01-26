<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StaffManagementController extends Controller
{
    public function index()
    {
        return view('admin-directory.admin-screens.staff-Management');
    }


}
