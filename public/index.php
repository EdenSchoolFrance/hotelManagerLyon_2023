<?php session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "HotelController@index");
$router->get('/client/', "HotelController@showclients");
$router->get('/client/:id', "HotelController@client");
$router->get('/chambres/', "HotelController@show_chambres");
$router->get('/piscines/', "HotelController@show_piscines");

$router->get('/salles/', "HotelController@show_salles");
// $router->get('/salles/', "HotelController@show_salles");

$router->get('/salles/', "HotelController@show_salles");
$router->get('/restaurants/', "HotelController@show_restaurants");
$router->get('/restaurants/:id', "HotelController@show_menus");
// $router->get('/restaurants/', "HotelController@show_restaurants");

$router->get('/bars/', "HotelController@show_bars");
// $router->get('/bars/', "HotelController@show_bars");


$router->post('/client/inscription', "HotelController@inscription_client");
$router->post('/client/supprimer', "HotelController@delete_client");
// $router->post('/register/', "VoyageController@register");

// Reservations
$router->post('/chambres/reserver/', "HotelController@reserve_chambres");
$router->post('/piscines/reserver/', "HotelController@reserve_piscines");


$router->run();

//les route get et post