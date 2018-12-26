
<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('show',function(){
    return view('auth.login');
});

Route::get('showRegister','Auth\RegisterController@showRegistrationForm');
Route::post('register','Auth\RegisterController@register')->name('register');
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware'=>'auth.home'],function(){
    //登陆之后
    Route::get('index','Home\PageController@root');
});


