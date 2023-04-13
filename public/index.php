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

//RESTAURANTS / BARS
$router->get('food/', "FoodController@allRestoBar");

$router->get('restaurant/:idrestaurant/', "FoodController@restaurant");
$router->get('commandMenu/:idmenu/', "FoodController@commandMenu");
$router->post('validCommandMenu/', "FoodController@validCommandMenu");

$router->get('bar/:idbar/', "FoodController@bar");
$router->get('commandBoisson/:idboisson/', "FoodController@commandBoisson");


//CLIENTS
$router->get('clients/', "ClientController@allClients");
$router->post('addClient/', "ClientController@addClient");
$router->get('updateClient/', "ClientController@updateClient");
$router->get('deleteClient/', "ClientController@deleteClient");



$router->run();
