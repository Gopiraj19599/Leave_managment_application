<?php

namespace App\Http\Controllers\StaffController;

use App\Http\Controllers\Controller;
use App\Models\LeaveData;
use App\Models\UserAccounts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class staffHomePageController extends Controller
{
    public function view()
    {
        $session = session()->all();

        if (isset($session['Staff_data'])) {
            $staff_data = UserAccounts::find($session['Staff_data']);
            return view('staff-directory.StaffScreen.homePage', compact('staff_data'));
        } else {
            return redirect('/')->with('message', 'You was logout pls login again');
        }
    }


    public function post(Request $request)
    {


        $request->validate([
            'To_email' => 'required',
            'Bcc_mail' => 'required',
            'Email_subject' => 'required',
            'Leave_type' => 'required',
            'Description' => 'required',
            'Date_of_leave_from' => 'required',
            'Date_of_leave_to' => 'required',
        ]);

        $staff_id = $request->session()->all();
        // dd($staff_id['Staff_data']);
        $User_data =UserAccounts::find($staff_id['Staff_data']);
        $mail =new LeaveData;

        $mail->type_of_leave  =$request->Leave_type;
        $mail->description =$request->Description;
        $mail->second_code = 'first_code';
        $mail->first_code = 'second_code';
        $mail->third_code = 'third_code';
        $mail->status_one = 'pending';
        $mail->status_two = 'pending';
        $mail->status_three = 'pending';

        $User_data->create_leave()->save($mail);


        $details= array(
            'To_email' => $request->To_email,
            'Bcc_mail' => $request->Bcc_mail,
            'Email_subject' => $request->Email_subject,
            'Leave_type' => $request->Leave_type,
            'Description' => $request->Description,
            'Date_of_leave_from' => $request->Date_of_leave_from,
            'Date_of_leave_to' => $request->Date_of_leave_to,
          );




        Mail::to($details['To_email'])
                ->cc($details['Bcc_mail'])
                ->send(new \App\Mail\MyTestMail($details));
        return redirect()->route('Staff-view-home')->with('message','Mail send successfully');








    }
}
