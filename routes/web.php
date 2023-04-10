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

Route::get('/register', [AuthController::class,'showRegister'])->name('register');
Route::post('/post-register', [AuthController::class,'register'])->name('post.register');
Route::get('/login', [AuthController::class,'showLogin'])->name('login');
Route::post('/post-login', [AuthController::class,'login'])->name('post.login');
Route::get('/logout', [AuthController::class, 'signOut'])->name('signout');


Route::group(['middleware' => 'auth'], function () {
    Route::resource('user', UsersController::class);
    Route::resource('timesheet', TimesheetsController::class);
    // //fullcalender
    Route::get('/fullcalendar1',[FullCalendarController::class,'index'])->name('fullcalendar.index');
    Route::post('/fullcalendar',[FullCalendarController::class,'store'])->name('fullcalendar.store');
    Route::patch('/fullcalendar/{timesheet}',[FullCalendarController::class,'update'])->name('fullcalendar.update');
    Route::delete('/fullcalendar/{timesheet}',[FullCalendarController::class,'destroy'])->name('fullcalendar.destroy');
    Route::get('/fullcalendar/{timesheet}',[FullCalendarController::class,'show'])->name('fullcalendar.show');
});

