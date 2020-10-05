<?php

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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::prefix('')->middleware(['auth'])->group(function () {
    Route::prefix('user')->name('user.')->group(function () {
        Route::prefix('password')->name('password.')->group(function () {
            Route::get('', 'UserController@editPassword')->name('index');
            Route::put('', 'UserController@updatePassword')->name('update');
        });
    });

    Route::get('home', 'HomeController@index')->name('home');
});
