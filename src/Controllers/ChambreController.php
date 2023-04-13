<?php

namespace Hotel\Controllers;

use Hotel\Models\ClientManager;
use Hotel\Models\ChambreManager;
use Hotel\Validator;

/** Class ChambreController **/
class ChambreController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new ChambreManager();
        $this->validator = new Validator();
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
        $error = true;

        $num_reservation = uniqid();
        $id_chambre = $_POST['idChambre'];
        $id_client = $_POST['client'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];

        //verification erreur formulaire
        $now = date('Y-m-d');
        if ($id_client == 0) {
            $_SESSION["error"]['client'] = "Veuillez selectionner un client";
            $error = false;
            header('Location: /reserveChambre/' . $id_chambre);
        } else if ($now > $date_debut || $now > $date_fin) {
            $_SESSION["error"]['date'] = "Veuillez selectionner des dates valides.";
            $error = false;
            header('Location: /reserveChambre/' . $id_chambre);
        } else if ($date_debut > $date_fin) {
            $_SESSION["error"]['date'] = "Veuillez selectionner une date de fin superieur à la date de début.";
            $error = false;
            header('Location: /reserveChambre/' . $id_chambre);
        }
        //verification disponibilités
        $reservations = $this->manager->getReservationsByChambre($id_chambre);
        while ($ligne = $reservations->fetch()) {
            if ($date_debut > $ligne['date_debut_reservation_chambre'] && $date_debut < $ligne['date_fin_reservation_chambre']) {
                $_SESSION["error"]['dispo'] = "Les dates que vous avez sélectionnez ne sont pas disponibles, veuillez verifier les disponibilités ci-dessus.";
                $error = false;
                header('Location: /reserveChambre/' . $id_chambre . '?error=dispo');
                break;
            } else if ($date_fin > $ligne['date_debut_reservation_chambre'] && $date_fin < $ligne['date_fin_reservation_chambre']) {
                $_SESSION["error"]['dispo'] = "Les dates que vous avez sélectionnez ne sont pas disponibles, veuillez verifier les disponibilités ci-dessus.";
                $error = false;
                header('Location: /reserveChambre/' . $id_chambre . '?error=dispo');
                break;
            } else if ($ligne['date_debut_reservation_chambre'] > $date_debut && $ligne['date_debut_reservation_chambre'] < $date_fin) {
                $_SESSION["error"]['dispo'] = "Les dates que vous avez sélectionnez ne sont pas disponibles, veuillez verifier les disponibilités ci-dessus.";
                $error = false;
                header('Location: /reserveChambre/' . $id_chambre . '?error=dispo');
                break;
            } else if ($ligne['date_fin_reservation_chambre'] > $date_debut && $ligne['date_fin_reservation_chambre'] < $date_fin) {
                $_SESSION["error"]['dispo'] = "Les dates que vous avez sélectionnez ne sont pas disponibles, veuillez verifier les disponibilités ci-dessus.";
                $error = false;
                header('Location: /reserveChambre/' . $id_chambre . '?error=dispo');
                break;
            }
        }
        //si aucunes erreurs, insertion de la reservation
        if ($error) {
            $this->manager->validReserveChambre($num_reservation, $id_chambre, $id_client, $date_debut, $date_fin);
            header('Location: /reserveChambre/' . $id_chambre . '?error=client');
        }
    }
}
