<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "HotelController@index");
$router->get('dashboard/client', "HotelController@client");
$router->get('dashboard/client/create', "HotelController@create");
$router->get('dashboard/client/liste', "HotelController@liste");

$router->post('dashboard/client/create/bdd', "HotelController@create_bdd");
$router->run();

//les route get et post