<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;

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
        require VIEWS . 'Hotel/index.php';
    }

    public function test()
    {
        require VIEWS . 'Hotel/test.php';
    }

    public function showNewClient()
    {
        require VIEWS . 'Hotel/Client/newClient.php';
    }

    //Insert client
    public function addNewClient()
    {
        $newClient = $this->manager->addNewClient();
        header('Location: /allClients');
    }

    //Show all clients
    public function showClients()
    {
        $clients = $this->manager->getClients();
        require VIEWS . 'Hotel/Client/allClients.php';
    }

    public function deleteClient($slug)
    {
        $this->manager->deleteClient($slug);
        header('Location: /allClients');
    }

    //Show update client form
    public function showUpdateClient($slug)
    {
        $client = $this->manager->getClient($slug);
        require VIEWS . 'Hotel/Client/updateClient.php';
    }

    //Update client infos
    public function updateClient($slug)
    {
        $changes = $this->manager->updateClient($slug);
        header('Location: /allClients');
    }

    //Select reservation user
    public function quiReserve()
    {
        $clients = $this->manager->getClients();
        require VIEWS . 'Hotel/Reservation/quiReserve.php';
    }

/*
    public function showReservationOptions()
    {
        $chambres = $this->manager->getChambres();
        require VIEWS . 'Hotel/Reservation/chambres.php';
    }
*/
    public function showOptions()
    {
        $restaurant = $this->manager->getRestaurants();
        $bar = $this->manager->getBars();
        require VIEWS . 'Hotel/Reservation/options.php';
    }

    public function showChambres()
    {
        $chambre = $this->manager->getChambres();
        require VIEWS . 'Hotel/Reservation/chambres.php';
    }
    public function showMenus()
    {
        $menu = $this->manager->getMenus();
        require VIEWS . 'Hotel/Reservation/menus.php';
    }
    public function showSalles()
    {
        $salle = $this->manager->getSalles();
        require VIEWS . 'Hotel/Reservation/salles.php';
    }
    
    public function showBoissons()
    {
        $boisson = $this->manager->getBoissons();
        require VIEWS . 'Hotel/Reservation/boissons.php';
    }


    /*
    //Show options form
    public function showReservationOptions()
    {
        require VIEWS . 'Hotel/Reservation/chooseOptions.php';
    }

    //Show options results
    public function reservationOptions()
    {
        $options = $this->manager->getReservationOptions();
        require VIEWS . 'Hotel/Reservation/reservationOptions.php';
    }
    */
}
