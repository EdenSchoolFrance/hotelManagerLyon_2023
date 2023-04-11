<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);

$router->get('/', "HotelController@index");
$router->get('/client/nouveau', "HotelController@newClient");

$router->get('/client/liste', "HotelController@listeClient");

$router->post('/client/nouveau', "HotelController@addClient");


$router->get('/client/delete/:id', "HotelController@deleteClient");

$router->get('/stock', "HotelController@stock");


$router->run();
