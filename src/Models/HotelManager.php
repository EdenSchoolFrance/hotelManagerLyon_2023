<?php

namespace Hotel\Models;

use Hotel\Models\Hotel;

/** Class HotelManager **/
class HotelManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
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
}
