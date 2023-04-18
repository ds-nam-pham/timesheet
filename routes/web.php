<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FullCalendarController;
use App\Http\Controllers\TimesheetsController;
use App\Http\Controllers\UsersController;
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

Route::get('register', [AuthController::class,'showRegister'])->name('register');
Route::post('post-register', [AuthController::class,'register'])->name('post.register');
Route::get('login', [AuthController::class,'showLogin'])->name('login');
Route::post('post-login', [AuthController::class,'login'])->name('post.login');
Route::get('logout', [AuthController::class, 'signOut'])->name('logout');
Route::get('forget-password', [AuthController::class, 'showEmail'])->name('forget.password');
Route::post('send-otp', [AuthController::class, 'sendOtp'])->name('send.otp');
Route::get('otp', [AuthController::class, 'showOtp'])->name('otp');
Route::post('new-password', [AuthController::class, 'newPassword'])->name('new.password');

Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', UsersController::class);
    Route::resource('timesheet', TimesheetsController::class);
    Route::get('timesheet/{timesheet}/approve/',[TimesheetsController::class,'approve'])->name('timesheet.approve');
    Route::get('users/{user}/timesheets/',[UsersController::class,'userTimesheets'])->name('users.timesheets.index');
    Route::get('users/{user}/change-password/',[UsersController::class,'changePassword'])->name('users.change_password');
    Route::patch('users/{user}/',[UsersController::class,'updateChangePassword'])->name('users.update_change_password');
    // //fullcalender
    Route::get('calendar',[FullCalendarController::class,'index'])->name('calendar.index');
    Route::post('calendar',[FullCalendarController::class,'store'])->name('calendar.store');
    Route::patch('calendar/{timesheet}',[FullCalendarController::class,'update'])->name('calendar.update');
    Route::delete('calendar/{timesheet}',[FullCalendarController::class,'destroy'])->name('calendar.destroy');
    Route::get('calendar/{timesheet}',[FullCalendarController::class,'show'])->name('calendar.show');
    
});

