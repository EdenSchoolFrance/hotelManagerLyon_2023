<?php

namespace Hotel\Controllers;

//les use permetteron de creer les variable des manager
use Hotel\Models\ClientManager;
use Hotel\Validator;

/** Class UserController **/
class ClientController
{
    //private $manager;
    private $validator;
    private $manager;

    public function __construct()
    {
        $this->manager = new ClientManager();
        $this->validator = new Validator();
        //variable pour tous les manager
    }

    // Affichage de la page principale
    public function index()
    {
        $mel = $this->manager->getAllClients();
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
        $client = $this->manager->showClientSpecific($slug);
        require VIEWS . 'Hotel/show_client.php';
    }

    public function inscription_client()
    {
        $id = uniqid();
        $prenom = htmlentities($_POST["prenom"]);
        $nom = htmlentities($_POST["nom"]);
        $email = htmlentities($_POST["email"]);
        $this->manager->showClientSpecific($id, $prenom, $nom, $email);
        header("Location:/");
    }
}
