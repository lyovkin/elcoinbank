<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/', 'WelcomeController@index');

    Route::get('/home', 'HomeController@index');

    Route::get('/admin', function () {
        return redirect()->route('admin.dashboard.index');
    });

    Route::bind('profile', function ($user_name) {

        $user = \App\Models\User::where('name', $user_name)->first();
        if(!$user)
        {
            $user = \App\Models\User::where('user_name', Auth::user()->name)->first();
        }
        return \App\Models\Profile::where('user_id', $user->id)->first();
    });

    Route::resource('profile', 'ProfileController');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'middleware' => 'admin'], function () {

    Route::resource('dashboard', 'AdminController');

    Route::model('user', 'App\\Models\\User');
    Route::resource('user', 'AdminUserController');

    Route::post('user/{user}/block', array(
        'uses' => 'AdminUserController@block',
        'as' => 'admin.user.block',
    ));

    Route::get('/user/{user}/addBalance',
        array('uses' => 'AdminModifyController@createBalance',
            'as' => 'admin.user.addmoney'));

    Route::post('/user/storeBalance',
        array('uses' => 'AdminModifyController@storeBalance',
            'as' => 'admin.user.storebalance'));
});


