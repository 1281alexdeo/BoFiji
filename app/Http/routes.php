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

Route::get('/', [
    'uses' => 'UserController@index',
    'as' => 'home'
]);

Route::get('/user/register',[
    'uses' => 'UserController@getRegister',
    'as' => 'user.register'
]);

Route::post('/user/register',[
    'uses' => 'UserController@postRegister',
    'as' => 'user.register'
]);

Route::get('/user/profile',[
   'uses' => 'UserController@getProfile',
   'as' => 'user.profile'
]);

