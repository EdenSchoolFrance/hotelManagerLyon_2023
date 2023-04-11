<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;

/** Class HotelController **/
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

    // Page nouveau client
    public function newClient()
    {
        require VIEWS . 'Hotel/nouveau.php';
    }

    // Function ajouter un Client
    public function addClient()
    {
        $this->validator->validate([
            "nom" => ["required"],
            "prenom" => ["required"],
            "mail" => ["required", "email"],
        ]);
        if (!$this->validator->errors()) {
            $this->manager->store();
            header("Location: /client/liste");
        } else {
            header("Location: /client/nouveau");
        }
    }
    // Affiche la Liste des clients
    public function listeClient()
    {
        $liste = $this->manager->clients();

        require VIEWS . 'Hotel/liste.php';
    }

    // Function supprimer un client
    public function deleteClient($slug)
    {
        $this->manager->suppClient($slug);
        header("location: /client/liste");
    }
}
