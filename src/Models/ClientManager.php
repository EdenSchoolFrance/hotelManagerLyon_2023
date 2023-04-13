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

    public function getClient($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE id_client = ?");
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Client");
        return $stmt->fetch();
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

    //get historique by client
    public function getReservationsChambreByClient($id_client)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client_chambre JOIN chambre ON client_chambre.id_chambre = chambre.id_chambre WHERE id_client = ?');
        $stmt->execute(array(
            $id_client,
        ));
        return $stmt;
    }
    public function getReservationsSalleByClient($id_client)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client_salle JOIN salle ON client_salle.id_salle = salle.id_salle WHERE id_client = ?');
        $stmt->execute(array(
            $id_client,
        ));
        return $stmt;
    }
    public function getConsoRestoByClient($id_client)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client_menu JOIN menu ON client_menu.id_menu = menu.id_menu WHERE id_client = ?');
        $stmt->execute(array(
            $id_client,
        ));
        return $stmt;
    }
    public function getConsoBarByClient($id_client)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client_boisson JOIN boisson ON client_boisson.id_boisson = boisson.id_boisson WHERE id_client = ?');
        $stmt->execute(array(
            $id_client,
        ));
        return $stmt;
    }

    //delete client
    public function deleteClient($id_client)
    {
        $stmt = $this->bdd->prepare('DELETE FROM `client_chambre` WHERE id_client = ?');
        $stmt->execute(array(
            $id_client,
        ));
        $stmt = $this->bdd->prepare('DELETE FROM `client_salle` WHERE id_client = ?');
        $stmt->execute(array(
            $id_client,
        ));
        $stmt = $this->bdd->prepare('DELETE FROM `client_boisson` WHERE id_client = ?');
        $stmt->execute(array(
            $id_client,
        ));
        $stmt = $this->bdd->prepare('DELETE FROM `client_menu` WHERE id_client = ?');
        $stmt->execute(array(
            $id_client,
        ));
        $stmt = $this->bdd->prepare('DELETE FROM `client` WHERE id_client = ?');
        $stmt->execute(array(
            $id_client,
        ));
    }
}
