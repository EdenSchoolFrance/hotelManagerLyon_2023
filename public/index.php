<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "HotelController@index");
$router->get('/client', "HotelController@client");
$router->get('/client/create', "HotelController@create");
$router->get('/client/liste', "HotelController@liste");
$router->get('/client/update', "HotelController@update");
$router->get('/client/delete', "HotelController@delete");

$router->post('/client/create/bdd', "HotelController@create_bdd");
$router->post('/client/liste', "HotelController@get_client");
$router->post('/client/update', "HotelController@update_bdd");
$router->post('/client/delete', "HotelController@delete_bdd");
$router->run();

//les route get et post