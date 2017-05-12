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



/**
 * Pages
 */

Route::get('about', function () {
    return view('pages.about');
});

Route::post('join', 'AccountsController@create');
Route::get('join', 'AccountsController@join_view');
Auth::routes();

/**
 * Admin Routes
 */

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::group(['middleware' => 'club_admin'], function() {
        Route::post('member', 'AdminController@getAccount');
        Route::post('member/{id}/roles', 'AdminController@updateRoles');
        Route::post('create', 'AdminController@store');
        Route::get('create', 'AdminController@create');
        Route::get('member/{id}', 'AdminController@show');
        Route::get('member', 'AdminController@member');
    });
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
