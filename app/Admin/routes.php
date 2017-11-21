<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'IndexController@index');
   	$router->resource('users', UserController::class);
   	$router->get('index', 'HomeController@index');
   	$router->get('editors','IndexController@editors');
});


