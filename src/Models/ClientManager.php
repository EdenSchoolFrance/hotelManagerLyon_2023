<?php

namespace Hotel\Models;

use Hotel\Models\Client;

/** Class UserManager **/
class ClientManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getAllClients()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function find($email)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE email_client = ?");
        $stmt->execute(array(
            $email
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Client");
        return $stmt->fetch();
    }

    public function addClient()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client(nom_client, prenom_client, email_client, mdp_client) VALUES (?, ?, ?, ?)");
        $stmt->execute(array(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["email"],
            password_hash($_POST['password'], PASSWORD_BCRYPT),
        ));
    }
}
