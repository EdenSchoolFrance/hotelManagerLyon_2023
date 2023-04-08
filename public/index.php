<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);

$router->get('/addClient', "HotelController@index");
$router->get('/showClients', "HotelController@showClients");
$router->get('/addClients/error', "HotelController@index");
$router->get('/deleteClient/:Client', "HotelController@removeClient");
$router->get('/updateClient/:Client', "HotelController@showUpdateClient");
$router->get('/reservation/:Client', "HotelController@showReservation");

$router->post('/addClient', "HotelController@addClient");
$router->post('/updateClient/:Client', "HotelController@updateClient");

$router->run();
