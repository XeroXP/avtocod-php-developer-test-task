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

Route::get('/', 'MainController@index')->name('index');
Route::get('registration', 'Auth\RegisterController@index')->name('auth.showRegisterForm');
Route::post('registration', 'Auth\RegisterController@register')->name('auth.register');
Route::get('login', 'Auth\LoginController@showLoginForm')->name('auth.showLoginForm');
Route::post('login','Auth\LoginController@login')->name('auth.login');
Route::get('logout', 'Auth\LoginController@logout')->name('auth.logout');
