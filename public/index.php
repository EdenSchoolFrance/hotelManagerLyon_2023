<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "HotelController@index");

$router->get('/newclient', "HotelController@showNewClient"); //Require new client view
$router->post('/allclients', "HotelController@addNewClient");
$router->get('/allclients', "HotelController@showClients"); //Show all clients

$router->get('/newReservation', "HotelController@quiReserve"); //Select user that reserve
$router->get('/reservation/:IdClient', "HotelController@showReservationOptions");
$router->post('/reservation/options', "HotelController@reservationOptions");

$router->get('/delete/:IdClient', "HotelController@deleteClient");
$router->get('/update/:IdClient', "HotelController@showUpdateClient");
$router->post('/update/:IdClient', "HotelController@updateClient");

$router->get('/test', "HotelController@test");
$router->get('/register/', "UserController@showRegister");
$router->get('/login/', "UserController@showLogin");
$router->get('/logout/', "UserController@logout");

$router->post('/register/', "UserController@register");
$router->post('/login/', "UserController@login");


$router->run();
