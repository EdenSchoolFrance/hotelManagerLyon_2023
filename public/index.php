<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "HotelController@index");

//CLIENT
$router->get('/newclient', "HotelController@showNewClient"); //Add client form
$router->post('/allclients', "HotelController@addNewClient");
$router->get('/allclients', "HotelController@showClients"); //Show all clients

$router->get('/delete/:IdClient', "HotelController@deleteClient"); //Delete client request
$router->get('/update/:IdClient', "HotelController@showUpdateClient"); //Update client form
$router->post('/update/:IdClient', "HotelController@updateClient"); //Update client request

//RESERVATION
$router->get('/newReservation', "HotelController@quiReserve"); //Select user qui réserve
$router->get('/reservation', "HotelController@showOptions");
$router->get('/reservation/chambres', "HotelController@showChambres");
$router->get('/reservation/menus', "HotelController@showMenus"); //Show menus


//$router->get('/reservation/client:IdClient', "HotelController@showReservationOptions"); //List options réservation
//$router->post('/reservation/options', "HotelController@reservationOptions"); //Affiche options choisies


$router->get('/test', "HotelController@test");
$router->get('/register/', "UserController@showRegister");
$router->get('/login/', "UserController@showLogin");
$router->get('/logout/', "UserController@logout");

$router->post('/register/', "UserController@register");
$router->post('/login/', "UserController@login");


$router->run();
