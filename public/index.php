<?php session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
// Page principale
$router->get('/', "HotelController@index");
// Affichage de tous les clients
$router->get('/client/', "HotelController@showclients");
// Affichage d'un client en particulier
$router->get('/client/:id', "HotelController@client");
// Affichage des chambres
$router->get('/chambres/', "HotelController@show_chambres");
// Affichage de toutes les piscines
$router->get('/piscines/', "HotelController@show_piscines");
// Affichage de toutes les salles
$router->get('/salles/', "HotelController@show_salles");
// Affichage de tous les restaurants
$router->get('/restaurants/', "HotelController@show_restaurants");
// Affichage d'un restaurant en particulier
$router->get('/restaurants/:id', "HotelController@show_menus");
// Affichage de tous les bars
$router->get('/bars/', "HotelController@show_bars");
// Affichage de toutes les boissons disponible
$router->get('/bars/show/', "HotelController@show_boissons");

// Ajout d'un client dans la bdd
$router->post('/client/inscription', "HotelController@inscription_client");
// Suppression d'un client
$router->post('/client/supprimer', "HotelController@delete_client");
// Reservations 
$router->post('/chambres/reserver/', "HotelController@reserve_chambres");
$router->post('/piscines/reserver/', "HotelController@reserve_piscines");
$router->post('/salles/reserver/', "HotelController@reserve_salles");
$router->post('/menu/reserver/', "HotelController@reserve_menus");
$router->post('/boisson/reserver/', "HotelController@reserve_boissons");


$router->run();

//les route get et post