<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Form Login And Register / Admin
Route::get('/login/admin', 'App\Http\Controllers\Auth\LoginAdminController@showAdminLoginForm');
Route::get('/register/admin', 'App\Http\Controllers\Auth\RegisterController@showAdminRegisterForm');
// Login And Admin Store Register
Route::post('/login/admin', 'App\Http\Controllers\Auth\LoginAdminController@adminLogin');
Route::post('/register/admin', 'App\Http\Controllers\Auth\RegisterController@createAdmin');

// Form Login And Register / Admin
Route::get('/login/writer', 'App\Http\Controllers\Auth\LoginAdminController@showWriterLoginForm');
Route::get('/register/writer', 'App\Http\Controllers\Auth\RegisterController@showWriterRegisterForm');
// Login And Register Store Admin
Route::post('/login/writer', 'App\Http\Controllers\Auth\LoginAdminController@writerLogin');
Route::post('/register/writer', 'App\Http\Controllers\Auth\RegisterController@createWriter');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin')->middleware('auth:admin');
Route::view('/writer', 'writer')->middleware('auth:writer');
