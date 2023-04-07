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
    Route::get('/user', [UsersController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UsersController::class, 'create'])->name('user.create');
    Route::post('/user', [UsersController::class, 'store'])->name('user.store');
    Route::get('/user/{id}', [UsersController::class, 'show'])->name('user.show');
    Route::get('/user/{id}/edit', [UsersController::class, 'edit'])->name('user.edit');
    Route::post('/user/{id}', [UsersController::class, 'update'])->name('user.update');;
    Route::get('/user/{id}/delete', [UsersController::class, 'destroy'])->name('user.destroy');

    Route::get('/timesheet', [TimesheetsController::class, 'index'])->name('timesheet.index');
    Route::get('/timesheet/create', [TimesheetsController::class, 'create'])->name('timesheet.create');
    Route::post('/timesheet', [TimesheetsController::class, 'store'])->name('timesheet.store');
    Route::get('/timesheet/{id}', [TimesheetsController::class, 'show'])->name('timesheet.show');
    Route::get('/timesheet/{id}/edit', [TimesheetsController::class, 'edit'])->name('timesheet.edit');
    Route::post('/timesheet/{id}', [TimesheetsController::class, 'update'])->name('timesheet.update');;
    
    //fullcalender
    Route::get('fullcalendar',[FullCalendarController::class,'index']);
    Route::post('fullcalendar/create',[FullCalendarController::class,'store']);
    Route::post('fullcalendar/update',[FullCalendarController::class,'update']);
    Route::post('fullcalendar/delete',[FullCalendarController::class,'destroy']);
});

