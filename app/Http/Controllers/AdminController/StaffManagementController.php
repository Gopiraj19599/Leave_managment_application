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

     public function store(Request $request){

        $validated = $request->validate([
            'staff_id' => 'required|unique:posts|max:255',
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'position' => 'required',

        ]);

        dd($request);


     }

}
