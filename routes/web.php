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

Route::group(['domain' => 'api.ahscpc.org'], function () {
    Route::group(['prefix' => 'token'], function() {
        Route::get('', function () {
            die('Invalid API Request.');
        });
        Route::get('{token}/', function () {
            die('Invalid API Request.');
        });
        Route::get('{token}/members', 'ApiController@members');
        Route::get('{token}/members/{sid}', 'ApiController@member');
    });

    Route::get('/', function() {
        return view('api.index');
    });
});

Route::get('/', function () {
    return view('index');
});

/**
 * Pages
 */

/**
 * Show the about page view
 */

Route::get('about', function () {
    return view('pages.about');
});

/**
 * Show the management page
 */

Route::get('management', 'AccountsController@management');

/**
 * Show the member roster
 */
Route::group(['prefix' => 'members'], function() {
    Route::get('/', 'AccountsController@members');
    Route::get('{id}', 'AccountsController@show');
});

/**
 * Admin Routes
 */

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function() {
    Route::group(['middleware' => 'director_admin'], function() {
        
    });
    Route::group(['middleware' => 'club_admin'], function() {
        
        /**
         * Fetch member account information by posting ID
         */
        
        Route::post('member', 'AdminController@getAccount');
        
        /**
         * Update member account roles
         */
        
        Route::post('member/{id}/roles', 'AdminController@updateRoles');
        
        /**
         * Create new membership
         */
        
        Route::post('create', 'AdminController@store');
        
        /**
         * Send broadcast
         */
        
        Route::post('broadcast', 'AdminController@send_broadcast');
        
        /**
         * Show membership create page
         */
        
        Route::get('create', 'AdminController@create');
        
        /**
         * Show information about given controller by ID
         */
        
        Route::get('member/{id}', 'AdminController@show');
        
        /**
         * Run reset password method for given account ID
         */
        
        Route::get('member/{id}/passwordreset', 'AdminController@resetPassword');
        
        /**
         * Show member search page
         */
        
        Route::get('member', 'AdminController@member');
        
        /**
         * Show broadcast page
         */
        
        Route::get('broadcast', 'AdminController@show_broadcast');
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

/**
 * Create new account
 */

Route::post('join', 'AccountsController@create');

/**
 * Show registration page
 */

Route::get('join', 'AccountsController@join_view');

/**
 * Load Laravel Auth routes
 */

Auth::routes();

/**
 * Log user out of the application
 */

Route::get('logout', function () {
    Auth::logout();
    
    session()->flash('success', 'You have successfully logged out.');
    return redirect('/');
});
