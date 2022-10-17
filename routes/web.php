<?php

$router->group(['prefix' => 'api'], function() use ($router) {
    $router->post('register', 'AuthController@register');
    $router->post('login', 'AuthController@login');
    $router->post('refresh', 'AuthController@refresh');
    $router->get('logout', 'AuthController@logout');
});

$router->group(['prefix' => 'api', ], function() use($router) {
    $router->get('index', 'TodoController@index');

    $router->group(['middleware' => 'auth'], function() use($router){
        $router->post('add-todo', 'TodoController@store');
        $router->put('update/{id}', 'TodoController@update');
        $router->delete('delete/{id}', 'TodoController@delete');
    });
});

