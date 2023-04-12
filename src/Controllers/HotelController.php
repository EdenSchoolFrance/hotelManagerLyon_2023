<?php

namespace Hotel\Controllers;

use Hotel\Models\ClientManager;
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

    public function index()
    {
        require VIEWS . 'homepage.php';
    }

    //afficher toutes les chambres
    public function allChambres()
    {
        $chambres = $this->manager->getAllChambres();
        require VIEWS . 'Hotel/chambres.php';
    }

    //afficher le formulaire de réservation d'une chambre
    public function reserveChambre($slug)
    {
        $chambre = $this->manager->getChambre($slug);
        $reservations = $this->manager->getReservationsByChambre($slug);
        $clientManager = new ClientManager();
        $clients = $clientManager->getAllClients();

        require VIEWS . 'Hotel/reserveChambre.php';
    }
}
