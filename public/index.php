<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Hotel\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "HotelController@index");
$router->get('/catalog', "HotelController@catalog");
$router->get('/reservation/:id/', "HotelController@reservation");
$router->get('/filtered/:filter/', "HotelController@filtred");
$router->get('/register', "HotelController@registerView");
$router->get('/login', "HotelController@loginView");
$router->get('/logout', "HotelController@logout");
$router->get('/commande/:id_commandes/', "HotelController@recu");

$router->post('/payer', "HotelController@vacances");
$router->post('/login/', "HotelController@login");
$router->post('/register/', "HotelController@register");

$router->run();

//les route get et post