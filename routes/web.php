<?php

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\httpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController\EmailController;
use App\Http\Controllers\StaffController\SettingController;
use App\Http\Controllers\AdminController\AdminSettingController;
use App\Http\Controllers\AdminController\UserAccountsController;
use App\Http\Controllers\AdminController\AdminHomePageController;
use App\Http\Controllers\StaffController\staffHomePageController;
use App\Http\Controllers\AdminController\StaffManagementController;
use App\Http\Controllers\AdminController\AdminLeaveManageController;
use App\Models\StaffManagement;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//    *******************   Login  ************************

Route::get('/', [LoginController::class,"Login"])->name('login');

Route::post('post-login', [LoginController::class,"post"])->name('handle-login');

Route::get('/log_out_admin',[LoginController::class,'logout'])->name('log_out_admin');


// *****************   admin Home Page    ********************

Route::get('/view-home', [AdminHomePageController::class,"view"])->name('view-home');




//  ******************* admin  Staff management   ******************



Route::get('/view-staff-management', [StaffManagementController::class,"index"])->name('view-staff-management');

Route::post('admin-create-staff', [StaffManagementController::class,"Store"])->name('admin-create-staff');

Route::get('/edit-staff/{id}', [StaffManagementController::class,'edit'])->name('edit-staff');

Route::post('updated-staff', [StaffManagementController::class,"update"])->name('updated-staff');

Route::get('delete-staff/{id}', [StaffManagementController::class,"delete"])->name('delete-staff');







//   ****************   admin Leave management  ********************

Route::get('/view-leave-history', [AdminLeaveManageController::class,"view"])->name('view-leave-history');


//  ****************    User Accounts   on admin log     ********************

Route::get('/view-user-accounts', [UserAccountsController::class,"index"])->name('view-user-accounts');

Route::post('create-user-account', [UserAccountsController::class,"Store"])->name('create-user-account');

Route::get('/edit-user-account/{id}', [UserAccountsController::class,'edit'])->name('edit-user-account');

Route::post('updated-user-account', [UserAccountsController::class,"update"])->name('updated-user-account');

Route::get('/delete-user-account/{id}', [UserAccountsController::class,"delete"])->name('delete-user-account');




//  ****************  admin settings  ******************

Route::get('/view-settings', [AdminSettingController::class,"view"])->name('view-settings');










// ============================    STAFF  ====================



//   ******************  staff home page *****************

Route::get("/Staff-view-home", [staffHomePageController::class,"view"])->name('Staff-view-home');

Route::post('handle-send-mail', [staffHomePageController::class,'post'])->name('handle-send-mail');



//    ********  staff    setting  *****************

Route::get('/staff-view-settings', [SettingController::class,'view'])->name('staff-view-settings');






// -------------------   send  email  with CEO PR and PM  ---------------------


// Route::get('/send-mail', function () {
//     $details = [
//         'title' => 'Request for leave',
//         'body' => 'n publishing and graphic design, Lorem ipsum is a placeholder text commonly used to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as a placeholder before final copy is available.'
//     ];

//     Mail::to('sasi@tealorca.com')
//     ->bcc('priyanka@gmail.com')
//     ->send(new \App\Mail\MyTestMail($details));

//     dd("mail send successfully");
// });



Route::view('fuck','demo');
