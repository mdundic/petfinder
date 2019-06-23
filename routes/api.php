<?php

$router->group(['middleware' => ['api'], 'as' => 'api-'], function ($router) {
    $router->group(['prefix' => 'pets', 'as' => 'pets-'], function ($router) {
        $router->group(['prefix' => 'lost', 'as' => 'lost-'], function ($router) {
            $router->post('/', [ 'as' => 'create', 'uses' => 'LostPetController@add']);
        });
    });
});
