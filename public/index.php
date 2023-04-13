<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
//Index of the webPage
$router -> get('/', "HotelController@index");
$router -> get('/client', "HotelController@client");
$router -> get('/chambre', "HotelController@chambre");
$router -> get('/chambre/:slug', "HotelController@chambre");

$router -> post('/client', "HotelController@addClient");
$router -> post('/chambre', "HotelController@addClientChambre");
$router->run();
