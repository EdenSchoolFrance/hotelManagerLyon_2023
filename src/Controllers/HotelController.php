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
    //valider la réservation d'une chambre
    public function validReserveChambre()
    {
        $num_reservation = uniqid();
        $id_chambre = $_POST['idChambre'];
        $id_client = $_POST['client'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];

        $reservations = $this->manager->getReservationsByChambre($id_chambre);
        //verification disponibilités
        $dispo = true;
        while ($ligne = $reservations->fetch()) {
            if ($date_debut > $ligne['date_debut_reservation_chambre'] && $date_debut < $ligne['date_fin_reservation_chambre']) {
                $dispo = false;
            } else if ($date_fin > $ligne['date_debut_reservation_chambre'] && $date_fin < $ligne['date_fin_reservation_chambre']) {
                $dispo = false;
            } else if ($ligne['date_debut_reservation_chambre'] > $date_debut && $ligne['date_debut_reservation_chambre'] < $date_fin) {
                $dispo = false;
            } else if ($ligne['date_fin_reservation_chambre'] > $date_debut && $ligne['date_fin_reservation_chambre'] < $date_fin) {
                $dispo = false;
            }
        }

        require VIEWS . 'Hotel/reserveChambre.php';
    }
}
