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
}
