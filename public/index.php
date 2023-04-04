<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
//Index of the webPage
$router -> get('/', "HotelController@index");
$router -> get('/client', "HotelController@client");

$router -> post('/client', "HotelController@addClient");
$router->run();
