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
        if (isset($_SESSION['client'])) {
            $_SESSION['client'] = "";
        }
        require VIEWS . 'Hotel/index.php';
    }

    //Show add client form
    public function showNewClient()
    {
        if (isset($_SESSION['client'])) {
            $_SESSION['client'] = "";
        }
        require VIEWS . 'Hotel/Client/newClient.php';
    }

    //Insert client
    public function addNewClient()
    {
        if (isset($_SESSION['client'])) {
            $_SESSION['client'] = "";
        }
        $newClient = $this->manager->addNewClient();
        header('Location: /allClients');
    }

    //Show all clients
    public function showClients()
    {
        if (isset($_SESSION['client'])) {
            $_SESSION['client'] = "";
        }
        $clients = $this->manager->getClients();
        require VIEWS . 'Hotel/Client/allClients.php';
    }

    //Delete client and all foreign key
    public function deleteClient($slug)
    {
        if (!isset($_SESSION['client'])) {
            header('Location: /newReservation');
        }
        $this->manager->deleteClientBoisson($slug);
        $this->manager->deleteClientChambre($slug);
        $this->manager->deleteClientMenu($slug);
        $this->manager->deleteClientPiscine($slug);
        $this->manager->deleteClientSalle($slug);
        $this->manager->deleteClient($slug);
        header('Location: /allClients');
    }

    //Show update client form
    public function showUpdateClient($slug)
    {
        if (isset($_SESSION['client'])) {
            $_SESSION['client'] = "";
        }
        $client = $this->manager->findClient($slug);
        require VIEWS . 'Hotel/Client/updateClient.php';
    }

    //Update client
    public function updateClient($slug)
    {
        if (isset($_SESSION['client'])) {
            $_SESSION['client'] = "";
        }
        $changes = $this->manager->updateClient($slug);
        header('Location: /allClients');
    }

    //Select user who reserves
    public function quiReserve()
    {
        $clients = $this->manager->getClients();
        require VIEWS . 'Hotel/Reservation/quiReserve.php';
    }

    //Show options form
    public function showOptions()
    {
        if (!isset($_SESSION['client'])) {
            header('Location: /newReservation');
        } else {
            $restaurant = $this->manager->getRestaurants();
            $bar = $this->manager->getBars();
            $piscine = $this->manager->getPiscines();
            require VIEWS . 'Hotel/Reservation/options.php';
        }
    }

    //Options
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
        $boisson = $this->manager->getBoissonsBar();
        require VIEWS . 'Hotel/Reservation/boissons.php';
    }


    public function showPiscines()
    {
        $piscine = $this->manager->getPiscines();
        require VIEWS . 'Hotel/piscines.php';
    }

    //Insert reservation with all selected options
    public function reservationInsert()
    {
        if (isset($_POST['id_chambre'])) { //si chambre sélectionnée

            if (isset($_POST['debut_chambre']) && isset($_POST['fin_chambre'])) { //si input date remplis

                if ($_POST['fin_chambre'] < $_POST['debut_chambre']) {
                    $_SESSION['message']['date_error'] = 'La date spécifiée est incohérente';
                    require VIEWS . 'Hotel/Reservation/options.php';
                } else if ($_POST['debut_chambre'] == null || $_POST['fin_chambre'] == null) {
                    $_SESSION['message']['date_miss'] = 'Veuillez indiquer une date dans les champs';
                    require VIEWS . 'Hotel/Reservation/options.php';
                }
            } else {
                $client_chambre = $this->manager->addClientChambre();
            }
        }

        if (isset($_POST['id_menu'])) {
            $client_menu = $this->manager->addClientMenu();
        }
        if (isset($_POST['id_salle'])) {
            $client_salle = $this->manager->addClientSalle();
        }
        if (isset($_POST['id_boisson'])) {
            $client_boisson = $this->manager->addClientBoisson();
        }
        if (isset($_POST['piscine']) && $_POST['piscine'] != 0) {
            $client_piscine = $this->manager->addClientPiscine();
        }
    }
}
