<?php

namespace Hotel\Models;

use Hotel\Models\Hotel;

/** Class UserHotel **/
class HotelManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function find($email)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE email_client = ?");
        $stmt->execute(array(
            $email
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");

        return $stmt->fetch();
    }

    public function addClient()
    {
        $stmt = $this->bdd->prepare("INSERT INTO " . $_POST["test"] . "(nom_client, prenom_client, email_client) VALUES (?, ?, ?)");
        $stmt->execute(array(
            htmlentities($_POST["firstName"]),
            htmlentities($_POST["lastName"]),
            htmlentities($_POST["email"]),
        ));
    }

    public function updateClient($slug)
    {
        $stmt = $this->bdd->prepare("UPDATE client SET nom_client = ?, prenom_client = ?, email_client = ? WHERE id_client = ?");
        $stmt->execute(array(htmlentities($_POST["lastName"]), htmlentities($_POST["firstName"]), htmlentities($_POST["email"]), $slug));
    }

    public function removeClient($slug)
    {

        $stmt = $this->bdd->prepare("DELETE FROM client WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));
    }

    public function show()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    public function showSpecifiqueClient($slug)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client WHERE id_client = ?');
        $stmt->execute(array($slug));

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    public function showChambre()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM chambre');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Chambre");
    }

    public function showChambreSpecifique()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM chambre WHERE id_chambre = ?');
        $stmt->execute(array($_POST["id_chambre"] ?? ""));

        return $stmt->fetch();
    }

    public function showRestoSpecifique()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM restaurant WHERE id_restaurant = ?');
        $stmt->execute(array($_POST["id_resto"] ?? ""));

        return $stmt->fetch();
    }

    public function showResto()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM restaurant');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function showPiscine()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM piscine');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Piscine");
    }

    public function showSalle()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM salle');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Salle");
    }

    /*
    public function addReservation()
    {
        if (isset($_POST["piscine"])) {
            $stmt = $this->bdd->prepare('INSERT INTO piscine (id_piscine, name_piscine, description_piscine, image_piscine, ouverture_piscine, fermeture_piscine, nettoyage_piscine) VALUES (?, ?, ?, ?, ?, ?, ?)');
            $stmt->execute(array("test", "test", "test", "test", "test", "test", "test"));
        }

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Restaurant");
    }
    */
}
