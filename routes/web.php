<?php

use App\Http\Controllers\AdminController\AdminHomePageController;
use App\Http\Controllers\AdminController\AdminLeaveManageController;
use App\Http\Controllers\AdminController\AdminSettingController;
use App\Http\Controllers\AdminController\StaffManagementController;
use App\Http\Controllers\AdminController\UserAccountsController;
use App\Http\Controllers\httpController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController\SettingController;
use App\Http\Controllers\StaffController\staffHomePageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/',[LoginController::class,"Login"])->name('login');
Route::post('post-login',[LoginController::class,"post"])->name('handle-login');


// *****************   admin Home Page    ********************

Route::get('/view-home-page',[AdminHomePageController::class,"view"])->name('view-home');



//  ******************* admin  Staff management   ******************

Route::get('/view-staff-management',[StaffManagementController::class,"index"])->name('view-staff-management');


//   ****************   admin Leave management  ********************

Route::get('/view-leave-history',[AdminLeaveManageController::class,"view"])->name('view-leave-history');


//  ****************   Admin User Accounts       ********************

Route::get('/view-user-accounts',[UserAccountsController::class,"view"])->name('view-user-accounts');



//  ****************  admin settings  ******************

Route::get('/view-settings',[AdminSettingController::class,"view"])->name('view-settings');



// ============================    STAFF  ====================



//   ******************  staff home page *****************

Route::get("/Staff-view-home",[staffHomePageController::class,"view"])->name('Staff-view-home');




//    ********  staff    setting  *****************
Route::get('/staff-view-settings',[SettingController::class,'view'])->name('staff-view-settings');
