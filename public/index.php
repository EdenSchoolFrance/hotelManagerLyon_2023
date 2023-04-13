<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
//Index of the webPage
$router -> get('/', "HotelController@index");
$router -> get('/client', "HotelController@client");
$router -> get('/gestionclient', "HotelController@getionClient");
$router -> get('/chambre', "HotelController@chambre");
$router -> get('/salle', "HotelController@salle");
$router -> get('/chambre/:slug', "HotelController@chambre");
$router -> get('/deleteclient/:slug', "HotelController@removeClient");

$router -> post('/client', "HotelController@addClient");
$router -> post('/chambre', "HotelController@addClientChambre");
$router -> post('/salle', "HotelController@addClientSalle");
$router->run();
