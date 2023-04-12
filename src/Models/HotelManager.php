<?php

namespace Hotel\Models;

use Hotel\Models\Hotel;

class HotelManager extends ConstructorManager
{
    private $manager;
    private $validator;

    //INSERT CLIENT
    public function addNewClient()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client (nom_client, prenom_client, email_client) VALUES (?, ?, ?)");
        $stmt->execute(array(
            htmlentities($_POST['nom']),
            htmlentities($_POST['prenom']),
            htmlentities($_POST['email']),
        ));
    }

    //SELECT ALL CLIENTS
    public function getClients()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client");
        $stmt->execute(array());

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    //SELECT CLIENT BY ID
    public function getClient($slug)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE id_client = ?");
        $stmt->execute(array(
            htmlentities($slug)
        ));

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }


    public function deleteClient($slug)
    {
        $stmt = $this->bdd->prepare("DELETE FROM client WHERE id_client = ?");
        $stmt->execute(array(
            htmlentities($slug),
        ));
    }

    public function updateClient($slug)
    {
        $stmt = $this->bdd->prepare("UPDATE client SET nom_client = ?, prenom_client = ?, email_client = ? WHERE id_client = ?");
        $stmt->execute(array(
            htmlentities($_POST['nom']),
            htmlentities($_POST['prenom']),
            htmlentities($_POST['email']),
            htmlentities($slug),
        ));
    }

    //SELECT FUNCTIONS
    //SELECT ALL CHAMBRES
    public function getChambres()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM chambre WHERE occupe_chambre = '0'");
        $stmt->execute(array());

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    //SELECT ALL MENUS
    public function getMenus()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM menu");
        $stmt->execute(array());

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    //SELECT ALL SALLES
    public function getSalles()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM salle");
        $stmt->execute(array());

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    //SELECT ALL RESTAURANTS
    public function getRestaurants()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM restaurant");
        $stmt->execute(array());

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    //SELECT ALL BARS
    public function getBars()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM bar");
        $stmt->execute(array());

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    //SELECT ALL BOISSONS
    public function getBoissons()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM boisson");
        $stmt->execute(array());

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    //SELECT ALL PISCINES
    public function getPiscines()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM piscine");
        $stmt->execute(array());

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }


    //INSERTION RESERVATION
    public function addClientChambre()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_chambre VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array(
            htmlentities($_SESSION['client']),
            htmlentities($_POST['id_chambre']),
            htmlentities($_POST['debut_chambre']),
            htmlentities($_POST['fin_chambre']),
            uniqid(),
            1
        ));
    }

    public function addClientMenu()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_menu VALUES (?, ?, ?, ?)");
        $stmt->execute(array(
            htmlentities($_SESSION['client']),
            htmlentities($_POST['id_menu']),
            htmlentities($_POST['quantite_menu']),
            htmlentities($_POST['date_menu']),
        ));
    }

    public function addClientSalle()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_salle VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array(
            htmlentities($_SESSION['client']),
            htmlentities($_POST['id_salle']),
            htmlentities($_POST['debut_salle']),
            htmlentities($_POST['fin_salle']),
            uniqid(),
            1
        ));
    }

    public function addClientBoisson()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_boisson VALUES (?, ?, ?, ?)");
        $stmt->execute(array(
            htmlentities($_SESSION['client']),
            htmlentities($_POST['id_boisson']),
            htmlentities($_POST['quantite_boisson']),
            htmlentities($_POST['date_boisson']),
        ));
    }

    public function addClientPiscine()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_piscine VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array(
            htmlentities($_POST['piscine']),
            htmlentities($_SESSION['client']),
            htmlentities($_POST['debut_piscine']),
            htmlentities($_POST['fin_piscine']),
            uniqid(),
            1
        ));
    }
}
