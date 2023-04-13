<?php

namespace Hotel\Controllers;

use Hotel\Models\ClientManager;
use Hotel\Models\SalleManager;
use Hotel\Validator;

/** Class SalleController **/
class SalleController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new SalleManager();
        $this->validator = new Validator();
    }

    //afficher toutes les salles
    public function allSalles()
    {
        $salles = $this->manager->getAllSalles();
        require VIEWS . 'Hotel/salles.php';
    }

    //afficher le formulaire de réservation d'une chambre
    public function reserveSalle($slug)
    {
        $salle = $this->manager->getSalle($slug);
        $reservations = $this->manager->getReservationsBySalle($slug);
        $clientManager = new ClientManager();
        $clients = $clientManager->getAllClients();
        require VIEWS . 'Hotel/reserveSalle.php';
    }

    //valider la réservation d'une salle
    public function validReserveSalle()
    {
        $error = true;

        $num_reservation = uniqid();
        $id_salle = $_POST['idSalle'];
        $id_client = $_POST['client'];
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];

        //verification erreur formulaire
        $now = date('dd-mm-YY');
        if ($id_client == 0) {
            $_SESSION["error"]['client'] = "Veuillez selectionner un client";
            $error = false;
            header('Location: /reserveSalle/' . $id_salle);
        } else if ($now > $date_debut || $now > $date_fin) {
            $_SESSION["error"]['date'] = "Veuillez selectionner des dates valides.";
            $error = false;
            header('Location: /reserveSalle/' . $id_salle);
        } else if ($date_debut > $date_fin) {
            $_SESSION["error"]['date'] = "Veuillez selectionner une date de fin superieur à la date de début.";
            $error = false;
            header('Location: /reserveSalle/' . $id_salle);
        }
        //verification disponibilités
        $reservations = $this->manager->getReservationsBySalle($id_salle);
        while ($ligne = $reservations->fetch()) {
            if ($date_debut > $ligne['date_debut_reservation_salle'] && $date_debut < $ligne['date_fin_reservation_salle']) {
                $_SESSION["error"]['dispo'] = "Les dates que vous avez sélectionnez ne sont pas disponibles, veuillez verifier les disponibilités ci-dessus.";
                $error = false;
                header('Location: /reserveSalle/' . $id_salle . '?error=dispo');
                break;
            } else if ($date_fin > $ligne['date_debut_reservation_salle'] && $date_fin < $ligne['date_fin_reservation_salle']) {
                $_SESSION["error"]['dispo'] = "Les dates que vous avez sélectionnez ne sont pas disponibles, veuillez verifier les disponibilités ci-dessus.";
                $error = false;
                header('Location: /reserveSalle/' . $id_salle . '?error=dispo');
                break;
            } else if ($ligne['date_debut_reservation_salle'] > $date_debut && $ligne['date_debut_reservation_salle'] < $date_fin) {
                $_SESSION["error"]['dispo'] = "Les dates que vous avez sélectionnez ne sont pas disponibles, veuillez verifier les disponibilités ci-dessus.";
                $error = false;
                header('Location: /reserveSalle/' . $id_salle . '?error=dispo');
                break;
            } else if ($ligne['date_fin_reservation_salle'] > $date_debut && $ligne['date_fin_reservation_salle'] < $date_fin) {
                $_SESSION["error"]['dispo'] = "Les dates que vous avez sélectionnez ne sont pas disponibles, veuillez verifier les disponibilités ci-dessus.";
                $error = false;
                header('Location: /reserveSalle/' . $id_salle . '?error=dispo');
                break;
            }
        }
        //si aucunes erreurs, insertion de la reservation
        if ($error) {
            $this->manager->validReserveSalle($num_reservation, $id_salle, $id_client, $date_debut, $date_fin);
            header('Location: /reserveSalle/' . $id_salle);
        }
    }
}
