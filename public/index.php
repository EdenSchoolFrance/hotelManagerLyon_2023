<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);

$router->get('/', "HotelController@index");
$router->get('/client/nouveau', "HotelController@newClient");
$router->get('/client/liste', "HotelController@listeClient");
$router->get('/client/delete/:id', "HotelController@deleteClient");
$router->get('/stock', "HotelController@stock");
$router->get('/chambres', "HotelController@chambres");
$router->get('/chambre/reserver/:id', "HotelController@reserverChambre");
$router->get('/chambres/indisponnibles/', "HotelController@chambresClients");

$router->post('/client/nouveau', "HotelController@addClient");
$router->post('/chambre/reserver/confirmer/:id', "HotelController@ConfirmationReservationChambre");
$router->get('/reservation/supprimer/chambre/:id', "HotelController@deleteReservationChambre");


$router->run();
