<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "HotelController@index");
$router->get('/client', "HotelController@showclients");
$router->get('/client/:id', "HotelController@client");
$router->get('/chambres/', "HotelController@show_chambres");

$router->post('/client/inscription', "HotelController@inscription_client");
// $router->post('/register/', "VoyageController@register");

$router->run();

//les route get et post