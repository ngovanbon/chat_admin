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

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/', ['as' => 'admin.index', 'uses' => 'AdminController@index']);
        Route::group(['prefix' => 'user'], function () {
            Route::get('/', ['as' => 'user.index', 'uses' => 'UserController@index']);
            Route::get('/user/create/', ['as' => 'user.create', 'uses' => 'UserController@create']);
            Route::get('/edit/{user_id}', ['as' => 'user.edit', 'uses' => 'UserController@update']);
            Route::post('/store', ['as' => 'user.store', 'uses' => 'UserController@store']);
            Route::delete('/delete/{user_id}', ['as' => 'user.delete', 'uses' => 'UserController@delete']);
        });
    });
});

Auth::routes();
