<?php

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
Route::get('/user', [UsersController::class, 'index']);
Route::get('/user/create', [UsersController::class, 'create']);
Route::post('/user', [UsersController::class, 'store'])->name('user.store');
Route::get('/user/{id}', [UsersController::class, 'show']);
Route::get('/user/{id}/edit', [UsersController::class, 'edit']);
Route::post('/user/{id}', [UsersController::class, 'update']);
Route::delete('/user/{id}', [UsersController::class, 'destroy']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
