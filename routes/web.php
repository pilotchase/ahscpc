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

/**
 * Global Routes
 */

Route::get('/', function () {
    return view('index');
});

Auth::routes();

/**
 * Pages
 */

Route::get('about', function () {
    return view('pages.about');
});

/**
 * Accounts Routes
 */

Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'], function() {
    Route::post('edit/{id}', 'AccountsController@editProfile');
    Route::post('password/{id}', 'AccountsController@changePassword');
    Route::get('/', 'AccountsController@index');
    Route::get('edit', 'AccountsController@edit');
    Route::get('password', 'AccountsController@password');
});

Route::get('logout', function () {
    Auth::logout();
    
    session()->flash('success', 'You have successfully logged out.');
    return redirect('/');
});
