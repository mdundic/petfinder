<?php

$router->group(['middleware' => ['api'], 'as' => 'api-'], function ($router) {
    $router->group(['prefix' => 'pets', 'as' => 'pets-'], function ($router) {
        $router->group(['prefix' => 'lost', 'as' => 'lost-'], function ($router) {
            $router->post('/', [ 'as' => 'add', 'uses' => 'LostPetController@add']);
            $router->get('search', [ 'as' => 'search', 'uses' => 'LostPetController@search']);
            $router->patch('{id}/found', [ 'as' => 'found', 'uses' => 'LostPetController@found']);
        });
    });
});
