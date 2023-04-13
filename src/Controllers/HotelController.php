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
        if (isset($_SESSION['client']) || isset($_COOKIE['client'])) {
            session_destroy();
            unset($_COOKIE['client']);
        }
        require VIEWS . 'Hotel/index.php';
    }

    //Show add client form
    public function showNewClient()
    {
        if (isset($_SESSION['client']) || isset($_COOKIE['client'])) {
            session_destroy();
            unset($_COOKIE['client']);
        }
        require VIEWS . 'Hotel/Client/newClient.php';
    }

    //Insert client
    public function addNewClient()
    {
        if (isset($_SESSION['client']) || isset($_COOKIE['client'])) {
            session_destroy();
            unset($_COOKIE['client']);
        }
        $newClient = $this->manager->addNewClient();
        header('Location: /allClients');
    }

    //Show all clients
    public function showClients()
    {
        if (isset($_SESSION['client']) || isset($_COOKIE['client'])) {
            session_destroy();
            unset($_COOKIE['client']);
        }
        $clients = $this->manager->getClients();
        require VIEWS . 'Hotel/Client/allClients.php';
    }

    //Delete client and all foreign key
    public function deleteClient($slug)
    {
        if (isset($_SESSION['client']) || isset($_COOKIE['client'])) {
            session_destroy();
            unset($_COOKIE['client']);
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
        if (isset($_SESSION['client']) || isset($_COOKIE['client'])) {
            session_destroy();
            unset($_COOKIE['client']);
        }
        $client = $this->manager->findClient($slug);
        require VIEWS . 'Hotel/Client/updateClient.php';
    }

    //Update client
    public function updateClient($slug)
    {
        if (isset($_SESSION['client']) || isset($_COOKIE['client'])) {
            session_destroy();
            unset($_COOKIE['client']);
        }
        $changes = $this->manager->updateClient($slug);
        header('Location: /allClients');
    }

    //Select user who reserves
    public function quiReserve()
    {
        if (isset($_SESSION['client']) || isset($_COOKIE['client'])) {
            session_destroy();
            unset($_COOKIE['client']);
        }
        $clients = $this->manager->getClients();
        require VIEWS . 'Hotel/Reservation/quiReserve.php';
    }

    //Show options form
    public function showOptions()
    {
        if (!isset($_SESSION['client']) || !isset($_COOKIE['client'])) {
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
        if (!isset($_SESSION['client']) || !isset($_COOKIE['client'])) {
            header('Location: /newReservation');
        }
        $chambre = $this->manager->getChambres();
        require VIEWS . 'Hotel/Reservation/chambres.php';
    }

    public function showMenus()
    {
        if (!isset($_SESSION['client']) || !isset($_COOKIE['client'])) {
            header('Location: /newReservation');
        }
        $menu = $this->manager->getMenus();
        require VIEWS . 'Hotel/Reservation/menus.php';
    }

    public function showSalles()
    {
        if (!isset($_SESSION['client']) || !isset($_COOKIE['client'])) {
            header('Location: /newReservation');
        }
        $salle = $this->manager->getSalles();
        require VIEWS . 'Hotel/Reservation/salles.php';
    }

    public function showBoissons()
    {
        if (!isset($_SESSION['client']) || !isset($_COOKIE['client'])) {
            header('Location: /newReservation');
        }
        $boisson = $this->manager->getBoissonsBar();
        require VIEWS . 'Hotel/Reservation/boissons.php';
    }


    public function showPiscines()
    {
        if (!isset($_SESSION['client']) || !isset($_COOKIE['client'])) {
            header('Location: /newReservation');
        }
        $piscine = $this->manager->getPiscines();
        require VIEWS . 'Hotel/piscines.php';
    }

    //Insert reservation with all selected options
    public function reservationInsert()
    {
        $formError = false; //si true, le form ne s'envoie pas, form affiche erreurs. Si false, insertion s'éxécute puis affiche vue facture

        if (isset($_POST['id_chambre'])) { //si chambre sélectionnée
            if (isset($_POST['debut_chambre']) && isset($_POST['fin_chambre'])) { //si input date existent

                if ($_POST['fin_chambre'] < $_POST['debut_chambre']) { //si date incohérente
                    $_SESSION['message']['date_error'] = 'La date spécifiée est incohérente';
                    $formError = true; //comptabilise l'erreur, passe à true

                } else if ($_POST['debut_chambre'] == null || $_POST['fin_chambre'] == null) { //si date invalide
                    $_SESSION['message']['date_miss'] = 'Veuillez indiquer une date dans les champs';
                    $formError = true;
                } else {
                    $client_chambre = $this->manager->addClientChambre(); //sinon insert
                }
            }
        }

        if (isset($_POST['id_menu'])) { //si menu sélectionnée
            if (!isset($_POST['date_menu']) || $_POST['date_menu'] == null) { //si date n'existe pas/incohérente
                $_SESSION['message']['date_miss'] = 'Veuillez indiquer une date dans les champs';
                $formError = true;
            } else {
                $client_menu = $this->manager->addClientMenu(); //insert
            }
        }

        if (isset($_POST['id_salle'])) {
            if (isset($_POST['debut_salle']) && isset($_POST['fin_salle'])) { //si input date remplit

                if ($_POST['fin_salle'] < $_POST['debut_salle']) { //si date cohérente
                    $_SESSION['message']['date_error'] = 'La date spécifiée est incohérente';
                    $formError = true;
                } else if ($_POST['debut_salle'] == null || $_POST['fin_salle'] == null) { //si date invalides
                    $_SESSION['message']['date_miss'] = 'Veuillez indiquer une date dans les champs';
                    $formError = true;
                } else {
                    $client_salle = $this->manager->addClientSalle();
                }
            }
        }
        if (isset($_POST['id_boisson'])) {
            if (!isset($_POST['date_boisson']) || $_POST['date_boisson'] == null) {
                $_SESSION['message']['date_miss'] = 'Veuillez indiquer une date dans les champs';
                $formError = true;
            } else {
                $client_boisson = $this->manager->addClientBoisson();
            }
        }
        if (isset($_POST['piscine']) && $_POST['piscine'] != 0) {
            if (isset($_POST['debut_piscine']) && isset($_POST['fin_piscine'])) {

                if ($_POST['fin_piscine'] < $_POST['debut_piscine']) {
                    $_SESSION['message']['date_error'] = 'La date spécifiée est incohérente';
                    $formError = true;
                } else if ($_POST['debut_piscine'] == null || $_POST['fin_piscine'] == null) {
                    $_SESSION['message']['date_miss'] = 'Veuillez indiquer une date dans les champs';
                    $formError = true;
                } else {
                    $client_piscine = $this->manager->addClientPiscine();
                }
            }
        }
        if ($formError == false) {
            require VIEWS . 'Hotel/Client/facture.php';
        } else {
            $this->showOptions();
            require_once VIEWS . 'Hotel/Reservation/options.php';
        }
    }
}
