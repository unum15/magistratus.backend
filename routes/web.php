<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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


$router->get('/people', ['uses' => 'PersonController@index', 'as' => 'person.index']);
$router->post('/person', ['uses' => 'PersonController@create', 'as' => 'person.create']);
$router->get('/person/{id:[0-9]+}', ['uses' => 'PersonController@read', 'as' => 'person.read']);
$router->patch('/person/{id:[0-9]+}', ['uses' => 'PersonController@update', 'as' => 'person.update']);
$router->delete('/person/{id:[0-9]+}', ['uses' => 'PersonController@delete', 'as' => 'person.delete']);