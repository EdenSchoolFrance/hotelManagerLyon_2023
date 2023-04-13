<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);

//HOMEPAGE
$router->get('/', "HotelController@index");

//CHAMBRES
$router->get('allChambres/', "ChambreController@allChambres");
$router->get('reserveChambre/:chambre/', "ChambreController@reserveChambre");
$router->post('validReserveChambre/', "ChambreController@validReserveChambre");

//RESTAURANTS
$router->get('food/', "FoodController@allResto");

//CLIENTS
$router->get('clients/', "ClientController@allClients");
$router->post('addClient/', "ClientController@addClient");
$router->get('updateClient/', "ClientController@updateClient");
$router->get('deleteClient/', "ClientController@deleteClient");



$router->run();
