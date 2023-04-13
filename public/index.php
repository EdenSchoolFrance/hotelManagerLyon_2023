<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "HotelController@index");
$router->get('/client', "HotelController@client");
$router->get('/client/create', "HotelController@create");
$router->get('/client/liste', "HotelController@liste");
$router->get('/client/update', "HotelController@update");
$router->get('/client/delete', "HotelController@delete");
$router->get('/salle', "HotelController@salle");
$router->get('/salle/create', "HotelController@salle_create");
$router->get('/piscine', "HotelController@piscine");
$router->get('/piscine/create', "HotelController@piscine_create");
$router->get('/chambre', "HotelController@chambre");
$router->get('/chambre/create/', "HotelController@chambre_create");
$router->get('/bar', "HotelController@bar");
$router->get('/bar/create/', "HotelController@bar_create");
$router->get('/restaurant', "HotelController@restaurant");
$router->get('/restaurant/create/', "HotelController@restaurant_create");

$router->post('/client/create/bdd', "HotelController@create_bdd");
$router->post('/client/liste', "HotelController@get_client");
$router->post('/client/update', "HotelController@update_bdd");
$router->post('/client/delete', "HotelController@delete_bdd");
$router->post('/salle/create/bdd', "HotelController@salle_create_bdd");
$router->post('/piscine/create/bdd', "HotelController@piscine_create_bdd");
$router->post('/chambre/create/bdd', "HotelController@chambre_create_bdd");
$router->post('/bar/create/bdd', "HotelController@bar_create_bdd");
$router->post('/restaurant/create/bdd', "HotelController@restaurant_create_bdd");
$router->run();

//les route get et post