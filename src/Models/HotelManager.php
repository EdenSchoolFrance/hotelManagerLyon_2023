<?php

namespace Hotel\Models;

use Hotel\Models\Hotel;
use Hotel\Models\Bdd;

/** Class HotelManager **/
class HotelManager extends Bdd
{
    // Ajout Client BDD
    public function store()
    {
        $stmt = $this->bdd->prepare("INSERT INTO `client` (`id_client`, `nom_client`, `prenom_client`, `email_client`) VALUES (?,?,?,?)");
        $stmt->execute(array(
            uniqid(),
            $_POST['nom'],
            $_POST['prenom'],
            $_POST['mail'],
        ));
    }

    // Select Clients BDD
    public function clients()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM `client`");
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    // Supprimer Client BDD
    public function suppClient($slug)
    {
        $stmt = $this->bdd->prepare("DELETE FROM `client` WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));
    }

    // Select stock boissons BDD
    public function stockboissons()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM `bar_boisson`
        JOIN boisson ON bar_boisson.id_boisson = boisson.id_boisson
        JOIN bar ON bar.id_bar = bar_boisson.id_bar");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }


    // Select chambres BDD
    public function chambres()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM `chambre`");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    // Select chambres reservation BDD
    public function chambreReservation($slug)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM `chambre` WHERE id_chambre = ?");
        $stmt->execute(array(
            $slug
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    // Check securite reservation possible
    public function checkreservation($slug)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM `chambre` WHERE id_chambre = ? AND occupe_chambre = '0' ");
        $stmt->execute(array($slug));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    // Ajouter reservation Chambre BDD
    public function ajouterReservationChambre($slug, $client, $dated, $datef)
    {
        $stmt = $this->bdd->prepare("INSERT INTO `client_chambre`(`id_client`, `id_chambre`, `date_debut_reservation_chambre`, `date_fin_reservation_piscine_chambre`, `num_reservation_chambre`, `status_chambre`) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array(
            $client,
            $slug,
            $dated,
            $datef,
            uniqid(),
            "0"
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    // Update to Indisponnible Chambre
    public function updateChambreIndisponnible($slug)
    {
        $stmt = $this->bdd->prepare("UPDATE `chambre` SET `occupe_chambre`='1' WHERE id_chambre = ?");
        $stmt->execute(array(
            $slug
        ));
    }

    // Update to Disponnible Chambre
    public function updateChambreDisponnible($slug)
    {
        $stmt = $this->bdd->prepare("UPDATE `chambre` SET `occupe_chambre`='0' WHERE id_chambre = ?");
        $stmt->execute(array(
            $slug
        ));
    }

    // Chambres prise par les clients
    public function ChambresClients()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM `client_chambre`
        JOIN chambre ON client_chambre.id_chambre = chambre.id_chambre
        JOIN client ON client_chambre.id_client = client.id_client");
        $stmt->execute(array());
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    // Supprimer reservation chambre
    public function deleteReservationChambre($slug)
    {
        $stmt = $this->bdd->prepare("DELETE FROM `client_chambre` WHERE id_chambre = ?");
        $stmt->execute(array($slug));
    }


    // Rechercher reservation chambre dun client
    public function searchReservationChambreClient($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM `client_chambre` JOIN chambre ON client_chambre.id_chambre = chambre.id_chambre WHERE id_client = ?");
        $stmt->execute(array($id));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
}
