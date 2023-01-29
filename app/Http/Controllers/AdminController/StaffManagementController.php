<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AdminAccounts;
use App\Models\StaffManagement;
use Illuminate\Http\Request;


class StaffManagementController extends Controller
{
    public function index()
    {

        $session = session()->all();
        if(isset($session["Admin_data"])){

        $staff_data = StaffManagement::all();
        $admin_data = AdminAccounts::find($session['Admin_data']);
        return view('admin-directory.admin-screens.staff-Management',compact('staff_data','admin_data'));

        }else{

            return redirect('/')->with('message','You was logout pls login again');
        }



    }


     public function store(Request $request){


        $validated = $request->validate([
            'staff_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'position' => 'required',

        ]);
         StaffManagement::create($request->post());

         return redirect('view-staff-management');
        // dd('successfully fully created staff');


     }


     public function edit($id){


        $session = session()->all();

        if(isset($session["Admin_data"])){
            $staff_data =StaffManagement::find($id);
            $admin_data = AdminAccounts::find($session['Admin_data']);
            return view('admin-directory.admin-screens.staff-Management-edit',compact('staff_data','admin_data'));

        }else{

            return redirect('/')->with('message','You was logout pls login again');
        }

     }



     public function update(Request $request)
     {
        $validated = $request->validate([
            'staff_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'email' => 'required',
            'phone_number' => 'required',
            'position' => 'required',

        ]);

        // dd($request);
        $updated = StaffManagement::find($request->id);
        // dd($updated);
        $updated->staff_id =$request->staff_id;
        $updated->first_name =$request->first_name;
        $updated->last_name =$request->last_name;
        $updated->date_of_birth =$request->date_of_birth;
        $updated->email =$request->email;
        $updated->phone_number =$request->phone_number;
        $updated->position =$request->position;
        $updated->save();
        return redirect()->route('view-staff-management')->with('message','Staff successfully Updated');

        //  return redirect()->route('companies.index')->with('success','Company Has Been updated successfully');
     }

     public function delete($id){

        $delete_staff = StaffManagement::find($id);

        $delete_staff->delete();

        return redirect()->route('view-staff-management')->with('message','Staff deleted successfully');


     }

}
