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

    // Affiche le Stock
    public function stock()
    {
        $stock = $this->manager->stockboissons();

        require VIEWS . 'Hotel/stock.php';
    }

    // Affiche les chambres
    public function chambres()
    {
        $chambres = $this->manager->chambres();

        require VIEWS . 'Hotel/chambre.php';
    }

    // Affichage pour Reserver une chambre
    public function reserverChambre($slug)
    {
        $checker = $this->manager->checkreservation($slug);
        if ($checker) {
            $clients = $this->manager->clients();
            $chambre = $this->manager->chambreReservation($slug);
            require VIEWS . 'Hotel/reserver_chambre.php';
        } else {
            header('Location: /chambres');
        }
    }

    // Reserver une chambre
    public function ConfirmationReservationChambre($slug)
    {
        if ($_POST['clients'] === "Selectionner un client" || $_POST['datedebut'] === "" || $_POST['datefin'] === "") {
            header('Location: /chambre/reserver/' . $slug);
        } else {
            $this->manager->ajouterReservationChambre($slug, $_POST['clients'], $_POST['datedebut'], $_POST['datefin']);
            $this->manager->updateChambreIndisponnible($slug);
            header('Location: /chambres');
        }
    }


    // Chambres reservées par les clients 
    public function chambresClients()
    {
        $chambresclients = $this->manager->ChambresClients();

        require VIEWS . 'Hotel/chambres_clients.php';
    }

    // Supprimer reservation chambre 
    public function deleteReservationChambre($slug)
    {
        $this->manager->deleteReservationChambre($slug);
        $this->manager->updateChambreDisponnible($slug);
        header('Location: /chambres/indisponnibles');
    }
}
