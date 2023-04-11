<?php

namespace Hotel\Models;

use Hotel\Models\Hotel;

/** Class UserManager **/
class HotelManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function getAll_client()
    {
        $stmt = $this->bdd->prepare('SELECT id_client, nom_client, prenom_client FROM client');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function insert_client($nom, $prenom, $email, $password)
    {
        $stmt = $this->bdd->prepare("INSERT INTO client (nom_client, prenom_client, email_client, mdp_client) VALUES (?, ?, ?, ?);");
        $stmt->execute(array(
            $nom,
            $prenom,
            $email,
            $password,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function update_client($nom, $prenom, $email, $password, $id)
    {
        $stmt = $this->bdd->prepare("UPDATE client SET nom_client=".$nom.", prenom_client=".$prenom.", email_client=".$email.", mdp_client=".$password."WHERE id_client = ".$id.";");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function get_client($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client WHERE client.id_client = ?');
        $stmt->execute(array(
            $id,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function get_reservations_client($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client_salle LEFT JOIN salle ON client_salle.id_salle = salle.id_salle WHERE client_salle.id_client = ?');
        $stmt->execute(array(
            $id,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
}
