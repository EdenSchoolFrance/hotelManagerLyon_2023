<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;

/** Class UserController **/
class HotelController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new HotelManager();
        $this->validator = new Validator();
    }

    //fonction qui recupere tout les plats disponibles et les affiche sur homepage.php
    public function index()
    {
        require VIEWS . 'homepage.php';
    }
}
