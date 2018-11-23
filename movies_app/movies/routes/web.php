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

// All movies
$router->get('/', 'MovieController@index');
$router->get('/movie/create', 'MovieController@create');
$router->get('/movie/{id}/edit', 'MovieController@edit');
$router->get('/movie/{id}/delete', 'MovieController@destroy');
$router->get('/movie/{id}', 'MovieController@show');

// One movie
$router->post('/movies', 'MovieController@store');
$router->put('/movie/{id}', 'MovieController@update');

// All directors
$router->get('/directors', 'DirectorController@index');
$router->get('/director/create', 'DirectorController@create');
$router->get('/director/{id}', 'DirectorController@show');

// One Director
$router->post('/directors', 'DirectorController@store');
$router->post('/director/choose', 'DirectorController@choose');

$router->get('/director/{id}/edit', 'DirectorController@edit');
$router->put('/director/{id}', 'DirectorController@update');

// Genre
$router->get('/genre/{name}', 'GenreController@show');