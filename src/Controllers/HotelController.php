<?php

namespace Hotel\Controllers;

//les use permetteron de creer les variable des manager
use Hotel\Models\HotelManager;
use Hotel\Validator;

/** Class UserController **/
class HotelController
{
    //private $manager;
    private $validator;
    private $manager;

    public function __construct()
    {
        $this->manager = new HotelManager();
        $this->validator = new Validator();
        //variable pour tous les manager
    }

    // Affichage de la page principale
    // public function index()
    // {
    //     $mel = $this->manager->getAllClients();
    //     require VIEWS . 'Hotel/homepage.php';
    // }
}
