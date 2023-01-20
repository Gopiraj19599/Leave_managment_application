<?php

use App\Http\Controllers\httpController;
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

Route::get('/', function () {
    return view('welcome');
});


Route::get('get_all', [httpController::class,"getAllData"])->name('getAllData');
Route::get('get_one/{id}', [httpController::class,"getOne_Data"])->name('getOne_Data')->where("id",'[0-9]+');
Route::get('get_one', [httpController::class,"update_post"])->name('update_post');
