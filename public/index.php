<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);

$router->get('/showClients', "HotelController@showClients");

$router->get('/addClients/error', "HotelController@index");

$router->get('/addClient', "HotelController@index");
$router->get('/deleteClient/:Client', "HotelController@removeClient");
$router->get('/updateClient/:Client', "HotelController@showUpdateClient");

$router->get('/reservation/:Client', "HotelController@showReservation");
$router->get('/showChambre/:Client', "HotelController@showChambre");
$router->get('/showRestaurant/:Client', "HotelController@showResto");
$router->get('/showPiscine/:Client', "HotelController@showPiscine");
$router->get('/showSalle/:Client', "HotelController@showSalle");

$router->post('/showClients', "HotelController@addReservation");

$router->post('/addClient', "HotelController@addClient");
$router->post('/updateClient/:Client', "HotelController@updateClient");
$router->post('/showChambre/:Client', "HotelController@showReservation");
$router->post('/showRestaurant/:Client', "HotelController@showReservation");
$router->post('/showPiscine/:Client', "HotelController@showReservation");
$router->post('/showSalle/:Client', "HotelController@showReservation");
$router->post('/showClient/', "HotelController@addReservation");

$router->run();
