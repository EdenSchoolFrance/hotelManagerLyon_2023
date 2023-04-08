<?php

namespace Hotel\Models;

use Hotel\Models\Hotel;

class HotelManager
{
    private $manager;
    private $validator;

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function reservation()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM chambre WHERE occupe_chambre = 0");
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
    //SELECT CLIENT ID
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

    public function getReservationOptions()
    {
        $options = $_POST['option'];
        foreach ($options as $option) {
            $stmt = $this->bdd->prepare("SELECT * FROM " . $option . "");
            $stmt->execute(array());

            return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
        }
    }
}
