<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "ClientController@index");
$router->get('/client/inscription/', "ClientController@inscription_client");
$router->get('/client', "ClientController@showclients");
$router->get('/client/:id', "ClientController@client");

$router->post('/register/', "VoyageController@register");

$router->run();

//les route get et post