<?php

/** Classe HotelSQLTest **/
namespace Hotel\Tests;
use Hotel\Models\Hotel;

class HotelSQLTest
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=127.0.0.1;dbname=hotel;charset=utf8;', "root", "");
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function getAll_client()
    {
        $stmt = $this->bdd->prepare('SELECT id_client, nom_client, prenom_client FROM client');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    public function getAll_salle()
    {
        $stmt = $this->bdd->prepare('SELECT id_salle, name_salle FROM salle');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    public function insert_reservation($id_client, $id_salle, $datedeb, $datefin, $status)
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_salle (id_client, id_salle, date_debut_reservation_salle, date_fin_reservation_salle, status_salle) VALUES (?, ?, ?, ?, ?);");
        $stmt->execute(array(
            $id_client,
            $id_salle,
            $datedeb,
            $datefin,
            $status
        ));
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
        $stmt = $this->bdd->prepare("UPDATE client SET nom_client=?, prenom_client=?, email_client=?, mdp_client=? WHERE id_client=?");
        $stmt->execute(array(
            $nom,
            $prenom,
            $email,
            $password,
            $id
        ));
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
    public function delete_client($id)
{
    // Supprimer les données liées dans la table "client_salle"
    $stmt1 = $this->bdd->prepare('DELETE FROM client_salle WHERE id_client = ?');
    $stmt1->execute(array(
        $id,
    ));

    // Supprimer les données liées dans la table "client_boisson"
    $stmt2 = $this->bdd->prepare('DELETE FROM client_boisson WHERE id_client = ?');
    $stmt2->execute(array(
        $id,
    ));

    // Supprimer les données liées dans la table "client_chambre"
    $stmt3 = $this->bdd->prepare('DELETE FROM client_chambre WHERE id_client = ?');
    $stmt3->execute(array(
        $id,
    ));

    // Supprimer les données liées dans la table "client_menu"
    $stmt4 = $this->bdd->prepare('DELETE FROM client_menu WHERE id_client = ?');
    $stmt4->execute(array(
        $id,
    ));

    // Supprimer les données liées dans la table "client_piscine"
    $stmt5 = $this->bdd->prepare('DELETE FROM client_piscine WHERE id_client = ?');
    $stmt5->execute(array(
        $id,
    ));

    // Supprimer le client de la table "client"
    $stmt6 = $this->bdd->prepare('DELETE FROM client WHERE id_client = ?');
    $stmt6->execute(array(
        $id,
    ));

    // Supprimer les parent avant le client pour éviter des erreurs avec les clés primaires
}
}
?>