<?php

namespace Hotel\Controllers;

use Hotel\Models\ClientManager;
use Hotel\Validator;

/** Class UserController **/
class ClientController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new ClientManager();
        $this->validator = new Validator();
    }

    public function index()
    {
        require VIEWS . 'homepage.php';
    }
    public function allClients()
    {
        $clients = $this->manager->getAllClients();
        require VIEWS . 'Hotel/clients.php';
    }

    public function addClient()
    {
        $this->validator->validate([
            "prenom" => ["required", "min:3", "alphaNum"],
            "nom" => ["required", "min:3", "alphaNum"],
            "email" => ["required", "email"],
            "password" => ["required", "min:6"]
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["email"]);

            if (empty($res)) {
                $this->manager->addClient();
                header('Location: /clients');
            } else {
                $_SESSION["error"]['client'] = "Le client que vous essayez d'ajouter existe déja !";
                header('Location: /clients');
            }
        } else {
            header('Location: /clients');
        }
    }

    public function historiqueClient($slug)
    {
        $client = $this->manager->getClient($slug);
        $reservationsChambre = $this->manager->getReservationsChambreByClient($slug);
        $reservationsSalle = $this->manager->getReservationsSalleByClient($slug);
        $consommationsRestaurant = $this->manager->getConsoRestoByClient($slug);
        $consommationsBar = $this->manager->getConsoBarByClient($slug);
        require VIEWS . 'Hotel/historique_commandes.php';
    }

    public function deleteClient($slug)
    {
        $this->manager->deleteClient($slug);
        header('Location: /clients');
    }
}
