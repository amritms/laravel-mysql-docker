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

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin', function(){
   return view('admin/admin_template');
});

Route::get('register', 'RegistrationController@register');
Route::post('register', 'RegistrationController@postRegister');

Route::get('register/confirm/{token}', 'RegistrationController@confirmEmail');

Route::get('login', 'SessionsController@login');
Route::post('login', 'SessionsController@postLogin');
Route::get('loginout', 'SessionsController@logout');