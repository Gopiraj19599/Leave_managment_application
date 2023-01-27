<?php

namespace App\Http\Controllers\StaffController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function post(Request $request)
    {


        $request->validate([
            'To_mail' => 'required',
            'Bcc_mail' => 'required',
            'Email_subject' => 'required',
            'Leave_type' => 'required',
            'Description' => 'required',
            'Date_of_leave_from' => 'required',
            'Date_of_leave_to' => 'required',
        ]);

        dd($request);




    }



}
