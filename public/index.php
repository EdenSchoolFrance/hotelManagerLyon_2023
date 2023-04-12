<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
//HOMEPAGE
$router->get('/', "HotelController@index");
//CHAMBRES
$router->get('allChambres/', "HotelController@allChambres");
$router->get('reserveChambre/:chambre/', "HotelController@reserveChambre");
$router->post('validReserveChambre/', "HotelController@validReserveChambre");
//CLIENTS
$router->get('clients/', "ClientController@allClients");
$router->post('addClient/', "ClientController@addClient");
$router->get('updateClient/', "ClientController@updateClient");
$router->get('deleteClient/', "ClientController@deleteClient");



$router->run();
