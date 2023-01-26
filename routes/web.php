<?php

use App\Http\Controllers\AdminController\AdminHomePageController;
use App\Http\Controllers\AdminController\AdminLeaveManageController;
use App\Http\Controllers\AdminController\AdminSettingController;
use App\Http\Controllers\AdminController\StaffManagementController;
use App\Http\Controllers\AdminController\UserAccountsController;
use App\Http\Controllers\httpController;
use App\Http\Controllers\LoginController;
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



Route::get('/',[LoginController::class,"Login"])->name('login');
Route::post('post-login',[LoginController::class,"post"])->name('handle-login');



Route::get('/view-home-page',[AdminHomePageController::class,"view"])->name('view-home');




Route::get('/view-staff-management',[StaffManagementController::class,"index"])->name('view-staff-management');


Route::get('/view-leave-history',[AdminLeaveManageController::class,"view"])->name('view-leave-history');



Route::get('/view-user-accounts',[UserAccountsController::class,"view"])->name('view-user-accounts');


Route::get('/view-settings',[AdminSettingController::class,"view"])->name('view-settings');


