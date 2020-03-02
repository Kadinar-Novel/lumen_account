<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/account', 'AccountController@index');
$router->post('/account/login', 'AccountController@login');
$router->post('/account', 'AccountController@store');
$router->post('/account/{id}/update_profile', 'AccountController@profile');
$router->post('/account/{id}/change_password', 'AccountController@password');
