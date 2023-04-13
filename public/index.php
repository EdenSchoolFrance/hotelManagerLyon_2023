<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
//Index of the webPage
$router -> get('/', "HotelController@index"); // Page accueil
$router -> get('/client', "HotelController@client");  // Page Ajouter client
$router -> get('/gestionclient', "HotelController@getionClient");  // Page Gestion Client
$router -> get('/chambre', "HotelController@chambre"); // Page ajout Chambre
$router -> get('/salle', "HotelController@salle"); // Page ajout Salle
$router -> get('/deleteclient/:slug', "HotelController@removeClient"); // Permet de delete des client par la voit GET

$router -> post('/client', "HotelController@addClient"); // Permet d'ajouter en base de donnée un client
$router -> post('/chambre', "HotelController@addClientChambre"); // Permet d'ajouter en base de donnée une chambre
$router -> post('/salle', "HotelController@addClientSalle"); // Permet d'ajouter en base de donnée une salle
$router->run();
