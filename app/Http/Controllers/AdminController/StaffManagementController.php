<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\StaffManagement;
use Illuminate\Http\Request;


class StaffManagementController extends Controller
{
    public function index()
    {
        $staff_data = StaffManagement::all();

        // dd($staff_data);

        return view('admin-directory.admin-screens.staff-Management',compact('staff_data'));
        // return view('admin-directory.admin-screens.staff-Management');

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

        $staff_data =StaffManagement::find($id);

        // dd($staff_data);

        return view('admin-directory.admin-screens.staff-Management-edit',compact('staff_data'));

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


        return redirect()->route('view-staff-management');









        //  return redirect()->route('companies.index')->with('success','Company Has Been updated successfully');
     }


}
