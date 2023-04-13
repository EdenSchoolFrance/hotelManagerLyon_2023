<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new hotel\Router($_SERVER["REQUEST_URI"]);
//Index of the webPage
$router -> get('/', "HotelController@index");
$router -> get('/list', "HotelController@list");
$router -> get('/add', "HotelController@addClientView");
$router -> get('/delete/:id', "HotelController@deleteClient");
$router -> get('/update/:id', "HotelController@updateClientView");
$router -> get('/reservation/:id', "HotelController@reservationView");
$router -> get('/commande/:id', "HotelController@commandeView");
$router -> get('/facture/:id', "HotelController@factureView");


$router -> post('/add', "HotelController@addClient");
$router -> post('/update', "HotelController@updateClient");
$router -> post('/addReservation', "HotelController@addReservation");
$router -> post('/commande/addCommandeBoisson', "HotelController@addCommandeBoisson");
$router -> post('/commande/addCommandeMenu', "HotelController@addCommandeMenu");
$router -> post('/addFacture', "HotelController@addFacture");

$router->run();
