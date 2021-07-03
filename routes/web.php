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

Auth::routes(['verify' => true]);

Route::group(['middleware'=>['auth', 'verified']], function () {
    Route::resource('users', 'UserController')->only(['index', 'create', 'store']);
});

Route::get('users/login', 'AuthUserController@getLogin');
Route::post('users/login', 'AuthUserController@login')->name('user.login');

Route::group(['middleware'=>'auth:customer_users'], function () {
    Route::get('user/home', 'AuthUserController@home')
        ->name('user.home');
    Route::get('sales', 'SaleController@index')
        ->middleware('can:sales')
        ->name('sales.index');
    Route::resource('configs', 'ConfigController')
        ->only(['index', 'edit', 'update'])
        ->middleware('can:configuration');
});

//Route::get('/home', 'HomeController@index')->name('home');
