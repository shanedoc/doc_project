
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

Route::get('/',function(){
    return view('auth.login');
});
Route::post('login', 'Auth\LoginController@login')->name('login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');




Route::group(['prex'=>'home','middleware'=>'auth.home'],function(){
    Route::get('index','Home\PageController@root')->name('root');
    Route::get('student/index',function(){
        return 'student/index';
    });
});


