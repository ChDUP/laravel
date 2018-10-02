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

Route::group(['middleware' => ['web']], function () {
    
    Route::get('email', 'EmailController@getForm');
    Route::post('email', ['uses' => 'EmailController@postForm', 'as' => 'storeEmail']);

    Route::get('photo', 'PhotoController@getForm');
    Route::post('photo', 'PhotoController@postForm');
    
    Route::get('contact', 'ContactController@getForm');
    Route::post('contact', 'ContactController@postForm');

    Route::get('users', 'UsersController@getInfos');
    Route::post('users', 'UsersController@postInfos');

    Route::get('{n}', function($n) {
        return response('Je suis la page '. $n .' !', 200);
    })->where('n', '[1-3]');

    Route::get('article/{n}', 'ArticleController@show')->where('n', '[0-9]+');

    Route::get('facture/{n}', function ($n) {
        return view('facture')->with('numero', $n);
    })->where('n', '[0-9]+');

    Route::get('/', 'WelcomeController@index');

    Route::get('/', function () {
        return view('welcome');
    });
});
