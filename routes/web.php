<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('create-user', 'App\Http\Controllers\UserController@createUser') ->name('user.create'); 
Route::post('store-user', 'App\Http\Controllers\UserController@storeUser') ->name('user.store'); 

Route::get('user-login', 'App\Http\Controllers\UserController@showLoginForm')->name('user.login');
Route::post('login', 'App\Http\Controllers\UserController@login') ->name('login')->middleware('throttle:login');

Route::middleware('auth')->get('user-home', 'App\Http\Controllers\UserController@showHomeForm')->name('user.home');
