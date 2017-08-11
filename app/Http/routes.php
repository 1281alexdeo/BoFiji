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

use Illuminate\Support\Facades\Mail;

Route::get('/{id?}', [
    'uses' => 'UserController@index',
    'as' => 'home'
])->middleware('revalidate');


Route::group(['prefix' => 'user'], function(){

    Route::group(['middleware' => 'guest'], function(){

        Route::get('/register',[
            'uses' => 'UserController@getRegister',
            'as' => 'user.register'
        ]);

        Route::post('/register',[
            'uses' => 'UserController@postRegister',
            'as' => 'user.register'
        ]);

        Route::get('/email/verification',[
            'uses' => 'UserController@getEmailVerification',
            'as' => 'email.verification'
        ]);

        Route::get('account/activated',[
            'uses' => 'UserController@emailResponse',
            'as' => 'email.response'
        ]);

        Route::get('/signin',[
            'uses' => 'UserController@getSignin',
            'as' => 'user.signin'
        ]);

        Route::post('/signin',[
            'uses' => 'UserController@postSignin',
            'as' => 'user.signin'
        ]);
    });

    Route::group(['middleware' => 'auth'], function(){

        Route::get('/profile/{id}',[
            'uses' => 'UserController@getProfile',
            'as' => 'user.profile'
        ])->middleware('revalidate');

        Route::post('/profile/{id}',[
            'uses' => 'UserController@postProfile',
            'as' => 'user.profile'
        ])->middleware('revalidate');

        Route::get('/pay/now',[
            'uses' => 'PaymentController@getPayNow',
            'as' => 'pay.now'
        ])->middleware('revalidate');

        Route::post('/pay/now',[
            'uses' => 'PaymentController@postPayNow',
            'as' => 'pay.now'
        ])->middleware('revalidate');


        Route::get('/payexceed/verification/',[
            'uses' => 'PaymentController@getPaymentExceed',
            'as' => 'payExceed.Confirmation'
        ])->middleware('revalidate');

        Route::get('payexceed/confirm/{email}/{token}',[
            'uses' => 'PaymentController@postPaymentExceed',
            'as' => 'payexceed.confirm'
        ])->middleware('revalidate');


        Route::get('/signout',[
            'uses' => 'UserController@signout',
            'as' => 'user.signout'
        ])->middleware('revalidate');

        Route::get('schedule/payment', [
            'uses' => 'PaymentController@getSchedulePay',
            'as' => 'schedule.pay'
        ])->middleware('revalidate');

        Route::post('schedule/payment', [
            'uses' => 'PaymentController@postSchedulePay',
            'as' => 'schedule.pay'
        ])->middleware('revalidate');

    });//revalidate prevents user from click back button to view previous user's details

});



