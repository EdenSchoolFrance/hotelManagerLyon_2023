<?php

namespace Hotel\Controllers;

//les use permetteron de creer les variable des manager
use Hotel\Models\HotelManager;
use Hotel\Models\ClientManager;
use Hotel\Validator;

/** Class UserController **/
class HotelController
{
    //private $manager;
    private $manager_hotel;
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager_hotel = new HotelManager();
        $this->manager = new ClientManager();
        $this->validator = new Validator();
        //variable pour tous les manager
    }

    // Affichage de la page principale
    public function index()
    {
        require VIEWS . 'Hotel/homepage.php';
    }

    // Affichage de la page de tous les clients
    public function showclients()
    {
        $clients = $this->manager->getAllClients();
        require VIEWS . 'Hotel/clients.php';
    }

    public function client($slug)
    {
        $clients = $this->manager->showClientSpecific($slug);
        require VIEWS . 'Hotel/show_client.php';
    }

    public function inscription_client()
    {
        $prenom = htmlentities($_POST["prenom"]);
        $nom = htmlentities($_POST["nom"]);
        $email = htmlentities($_POST["email"]);

        $res = $this->manager->find($prenom, $nom, $email);

        if (empty($res)) {
            $this->manager->CreateClient($prenom, $nom, $email);
            header("Location:/client");
        } else {
            $_SESSION["error"]['username'] = "La personne est déjà Inscrite";
            header("Location: /");
        }

        header("Location: /");
    }

    public function show_chambres()
    {
        $chambres = $this->manager_hotel->show_chambre();
        require VIEWS . 'Hotel/show_chambres.php';
    }

    public function show_piscines()
    {
        $piscines = $this->manager_hotel->show_piscines();
        require VIEWS . 'Hotel/show_piscines.php';
    }

    public function show_salles()
    {
        $salles = $this->manager_hotel->show_salles();
        require VIEWS . 'Hotel/show_salles.php';
    }

    public function show_restaurants()
    {
        $restaurants = $this->manager_hotel->show_restaurants();
        require VIEWS . 'Hotel/show_restaurants.php';
    }

    public function show_bars()
    {
        $bars = $this->manager_hotel->show_bars();
        require VIEWS . 'Hotel/show_bars.php';
    }
}
