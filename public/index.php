<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new hotel\Router($_SERVER["REQUEST_URI"]);
//Index of the webPage
$router -> get('/', "HotelController@index");

$router->run();
