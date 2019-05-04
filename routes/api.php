<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', 'AuthController@login');
    Route::post('signup', 'AuthController@signup');

    Route::group([
        'middleware' => 'auth:api'
    ], function () {
        Route::get('logout', 'AuthController@logout');
        Route::get('user', 'AuthController@user');
    });
});


Route::group([
    'prefix' => 'todo',
    'middleware' => 'auth:api'
], function () {
    Route::get('lists', 'TodoController@get_lists');
    Route::get('list/{id}', 'TodoController@get_list');
    Route::post('list', 'TodoController@create_list');
    Route::delete('list/{id}', 'TodoController@delete_list');
    Route::put('list/{id}', 'TodoController@update_list');

    Route::group([
        'prefix' => 'list/{list_id}'
    ], function () {
        Route::get('records', 'TodoController@get_records');
        Route::get('record/{id}', 'TodoController@get_record');
        Route::post('record', 'TodoController@create_record');
        Route::delete('record/{id}', 'TodoController@delete_record');
        Route::put('record/{id}', 'TodoController@update_record');
    });
});
