<?php

namespace App\Http\Controllers\AdminController;

use App\Http\Controllers\Controller;
use App\Models\AdminAccounts;
use App\Models\StaffManagement;
use App\Models\UserAccounts;
use Illuminate\Http\Request;



class UserAccountsController extends Controller
{
    public function index()
    {
        $session = session()->all();
      if(isset($session["Admin_data"])){
        $staff_data = StaffManagement::all();
        $user_list =UserAccounts::all();
        $admin_data = AdminAccounts::find($session['Admin_data']);
        return view('admin-directory.admin-screens.view-user-accound',compact('staff_data','user_list','admin_data'));

      }else{

        return redirect('/')->with('message','You was logout pls login again');
      }






    }

     public function store(Request $request){

        $validated = $request->validate([
            'staff_id' => 'required',
            'password' => 'required',
        ]);

               $staff_id = substr($request->staff_id,0,1);
               $email = substr($request->staff_id, 2);
               $staff = StaffManagement::find($staff_id);
               $create = new UserAccounts;
               $create->user_name = $request->user_name;
               $create->email =$email;
               $create->password =$request->password;
               $create->account_type ="Staff";
               $staff->create_user()->save($create);

         return redirect('view-user-accounts')->with('message','Successfully account had create');


     }


     public function edit($id)
     {
        $session = session()->all();
        if(isset($session["Admin_data"])){
            $user_data =UserAccounts::find($id);
            $admin_data = AdminAccounts::find($session['Admin_data']);
            return view('admin-directory.admin-screens.view-user-accound-edit',compact('user_data','admin_data'));
        }else{
            return redirect('/')->with('message','You was logout pls login again');
        }



     }

     public function update(Request $request)
     {


        $validated = $request->validate([
            'user_name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);


        $updated = UserAccounts::find($request->id);
        $updated->user_name =$request->user_name;
        $updated->email =$request->email;
        $updated->password =$request->password;
        $updated->save();
        return redirect()->route('view-user-accounts')->with('message','User account successfully Updated');


     }

     public function delete($id)
     {
        $delete_user_account = UserAccounts::find($id);

        $delete_user_account->delete();

        return redirect()->route('view-user-accounts')->with('message','User Account deleted successfully');

     }




}
