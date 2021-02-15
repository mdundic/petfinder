<?php

$router->group(['middleware' => ['api'], 'as' => 'api-'], function ($router) {
    $router->group(['prefix' => 'pets', 'as' => 'pets-'], function ($router) {
        $router->group(['prefix' => 'lost', 'as' => 'lost-'], function ($router) {
            $router->post('/', [ 'as' => 'add', 'uses' => 'LostPetController@add']);
            $router->get('search', [ 'as' => 'search', 'uses' => 'LostPetController@search']);
        });
        $router->group(['prefix' => 'found', 'as' => 'found-'], function ($router) {
            $router->post('/', [ 'as' => 'add', 'uses' => 'FoundPetController@add']);
            $router->get('search', [ 'as' => 'search', 'uses' => 'FoundPetController@search']);
        });
    });
});
