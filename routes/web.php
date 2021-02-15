<?php

Route::get('/', ['as' => 'home', 'uses' => 'IndexController@home']);

Route::group(['as' => 'admin-', 'prefix' => 'admin'], function () {
    Route::get('/login', ['as' => 'login', 'uses' => 'AdminAuthController@login']);
    Route::post('/login', ['as' => 'do-login', 'uses' => 'AdminAuthController@doLogin']);
    Route::get('/logout', ['as' => 'logout', 'uses' => 'AdminAuthController@logout']);
});

Route::group(['as' => 'admin-', 'prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', ['as' => 'index', 'uses' => 'AdminAuthController@index']);

    Route::group(['as' => 'user-', 'prefix' => 'user'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'AdminUsersController@index']);
        Route::get('/create', ['as' => 'create', 'uses' => 'AdminUsersController@create']);
        Route::post('/create', ['as' => 'create-submit', 'uses' => 'AdminUsersController@doCreate']);
        Route::get('/{id}/update', ['as' => 'update', 'uses' => 'AdminUsersController@update']);
        Route::post('/{id}/update', ['as' => 'update-submit', 'uses' => 'AdminUsersController@doUpdate']);
        Route::get('/{id}/delete', ['as' => 'delete', 'uses' => 'AdminUsersController@delete']);
    });

    Route::group(['as' => 'lost-pet-', 'prefix' => 'lost-pet'], function () {
        Route::get('/', ['as' => 'list', 'uses' => 'AdminLostPetsController@index']);
    });
});
