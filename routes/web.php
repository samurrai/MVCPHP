<?php

use Core\Auth;
use Klein\Klein;
use Klein\Request;
use Klein\Response;

$router->get('/', function (Request $request, Response $response)
{
    return controller('PostsController@index', $request, $response);
});

$router->get('/post', function (Request $request, Response $response)
{
    return controller('PostsController@view', $request, $response);
});


if (Auth::check()) {
    
    $router->with('/create', function () use($router){

        $router->get('', function (Request $request, Response $response)
        {
            return controller('PostsController@create', $request, $response);
        });

        $router->post('', function (Request $request, Response $response)
        {
            return controller('PostsController@insert', $request, $response);
        });

    });



    $router->with('/edit', function () use($router){

        $router->get('', function (Request $request, Response $response)
        {
            return controller('PostsController@edit', $request, $response);
        });

        $router->post('', function (Request $request, Response $response)
        {
            return controller('PostsController@update', $request, $response);
        });

    });

    
    $router->get('/logout', function (Request $request, Response $response)
    {
        return controller('LoginController@logout', $response);
    });
}
else{
    $router->with('/login', function () use($router){

        $router->get('', function (Request $request, Response $response)
        {
            return controller('LoginController@login', $request, $response);
        });

        $router->post('', function (Request $request, Response $response)
        {
            return controller('LoginController@make', $request, $response);
        });

    });
}


