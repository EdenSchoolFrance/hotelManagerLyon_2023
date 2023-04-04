<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;
//les use permetteron de creer les variable des manager
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
    public function index()
    {
        require VIEWS . 'Hotel/homepage.php';
    }

    // Affichage de la page 
    public function showclients()
    {
        $clients = $this->manager->getAllClients();
        require VIEWS . 'Hotel/clients.php';
    }

    // public function reservation($slug)
    // {
    //     $voyages = $this->manager->getAllLimit();
    //     $commende = $this->manager->getVoyage($slug);
    //     require VIEWS . 'Hotel/reservation.php';
    // }

    // public function commande()
    // {
    //         $uuid = uniqid();
    //         $prix = $this->manager->getVoyage($_POST['id_destination']);
    //         $prix_total = 0;
    //         $prix_total += $prix->getPrixDestination() * $_POST['Semaine'] * $_POST['vacanciers'];
    //         $commende = $this->commandes->store($uuid, $_SESSION['user']['id'], $_POST['id_destination'], $_POST['Semaine'], $_POST['vacanciers'], $prix_total);
    //         header('location:/commande/' . $uuid . '/');
    // }
    public function filtred($slug)
    {
        $voyages = $this->manager->getAllFiltred($slug);
        require VIEWS . 'v/catalog.php';
    }
    public function registerView()
    {
        require VIEWS . 'user/register.php';
    }
    public function loginView()
    {
        require VIEWS . 'user/login.php';
    }
}
