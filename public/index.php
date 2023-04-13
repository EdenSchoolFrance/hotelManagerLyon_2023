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
$router->post('validCommandBoisson/', "FoodController@validCommandBoisson");

//SALLES EVENEMENTIELLES
$router->get('salles/', "SalleController@allSalles");
$router->get('reserveSalle/:idsalle/', "SalleController@reserveSalle");
$router->post('validReserveSalle/', "SalleController@validReserveSalle");


//CLIENTS
$router->get('clients/', "ClientController@allClients");
$router->post('addClient/', "ClientController@addClient");
$router->get('historiqueClient/:idclient/', "ClientController@historiqueClient");
$router->get('deleteClient/:idclient/', "ClientController@deleteClient");




$router->run();
