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

Route::get('hash', function () {
    return bcrypt('vagaPHP2017-GS');
});

Route::group(['middleware' => ['web']], function() {

    Route::get('/login', [
        'as' => 'authentication.index',
        'uses' => 'AuthController@index'
    ]);

    Route::post('/login', [
        'as' => 'authentication.signin',
        'uses' => 'AuthController@signin'
    ]);

    Route::group(['middleware' => ['auth']], function() {

        Route::get('/', [
            'as' => 'properties.index',
            'uses' => 'PropertyController@index'
        ]);

        Route::get('/logout', [
            'as' => 'authentication.signout',
            'uses' => 'AuthController@signout'
        ]);

        Route::get('/perfil', function() {
            return view('profile.index');
        })->name('profile.index');

        Route::group(['prefix' => 'imoveis'], function() {
            Route::get('/imoveis.json', [
                'as' => 'ajax.properties.list',
                'uses' => 'PropertyController@ajaxList'
            ]);
            Route::get('/', [
                'as' => 'properties.create',
                'uses' => 'PropertyController@create'
            ]);
            Route::get('/{id}', [
                'as' => 'properties.update',
                'uses' => 'PropertyController@update'
            ]);
            Route::post('/', [
                'as' => 'properties.store',
                'uses' => 'PropertyController@store'
            ]);
            Route::delete('/', [
                'as' => 'properties.delete',
                'uses' => 'PropertyController@delete'
            ]);
        });

        Route::group(['prefix' => 'importacao'], function() {
            Route::get('/', [
                'as' => 'import.index',
                'uses' => 'ImportController@index'
            ]);
            Route::post('/', [
                'as' => 'import.upload',
                'uses' => 'ImportController@upload'
            ]);
        });

    });

});
