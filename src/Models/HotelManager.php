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
    public function getAll_salle()
    {
        $stmt = $this->bdd->prepare('SELECT id_salle, name_salle FROM salle');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function getAll_piscine()
    {
        $stmt = $this->bdd->prepare('SELECT id_piscine, name_piscine FROM piscine');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function getAll_chambre()
    {
        $stmt = $this->bdd->prepare('SELECT id_chambre, name_chambre FROM chambre');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function get_chambre_total($id)
    {
        $stmt = $this->bdd->prepare('SELECT prix_chambre FROM chambre WHERE id_chambre = ?');
        $stmt->execute(array(
            $id
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function getAll_bar()
    {
        $stmt = $this->bdd->prepare('SELECT id_bar, name_bar FROM bar');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function getAll_boisson()
    {
        $stmt = $this->bdd->prepare('SELECT id_boisson, name_boisson FROM boisson');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function getAll_restaurant()
    {
        $stmt = $this->bdd->prepare('SELECT id_restaurant, name_restaurant FROM restaurant');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function getAll_menu()
    {
        $stmt = $this->bdd->prepare('SELECT id_menu, name_menu FROM menu');
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
    public function insert_reservation_piscine($id_client, $id_salle, $datedeb, $datefin, $status)
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_piscine (id_client, id_piscine, date_debut_reservation_piscine, date_fin_reservation_piscine, status_piscine) VALUES (?, ?, ?, ?, ?);");
        $stmt->execute(array(
            $id_client,
            $id_salle,
            $datedeb,
            $datefin,
            $status
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function insert_reservation_boisson($id_client, $id_boisson, $quantite, $datedeb)
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_boisson (id_client, id_boisson, quantite_client_boisson , date_client_boisson) VALUES (?, ?, ?, ?);");
        $stmt->execute(array(
            $id_client,
            $id_boisson,
            $quantite,
            $datedeb,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function insert_reservation_menu($id_client, $id_menu, $quantite, $datedeb)
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_menu (id_client, id_menu, quantite_client_menu , date_client_menu) VALUES (?, ?, ?, ?);");
        $stmt->execute(array(
            $id_client,
            $id_menu,
            $quantite,
            $datedeb,
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
    public function get_reservations_Piscine_client($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client_piscine LEFT JOIN piscine ON client_piscine.id_piscine = piscine.id_piscine WHERE client_piscine.id_client = ?');
        $stmt->execute(array(
            $id,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function get_reservations_chambre_client($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client_chambre LEFT JOIN chambre ON client_chambre.id_chambre = chambre.id_chambre WHERE client_chambre.id_client = ?');
        $stmt->execute(array(
            $id,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function verif_reserver($id)
    {
        $stmt = $this->bdd->prepare('SELECT type_salle FROM salle WHERE id_salle = ?');
        $stmt->execute(array(
            $id,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function verif_boisson($bar,$boisson)
    {
        $stmt = $this->bdd->prepare('SELECT quantite_stock_bar_boisson FROM bar_boisson WHERE id_bar = ? AND id_boisson = ?');
        $stmt->execute(array(
            $bar,
            $boisson
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function verif_reserver_piscine($id,$datedeb,$datefin,$datetime)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM piscine WHERE id_piscine = ? AND nettoyage_piscine NOT BETWEEN ? AND ? AND ? BETWEEN ouverture_piscine AND fermeture_piscine');
        $stmt->execute(array(
            $id,
            $datedeb,
            $datefin,
            $datetime
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function verif_reserver_chambre($id)
    {
        $stmt = $this->bdd->prepare('SELECT occupe_chambre FROM chambre WHERE id_chambre = ?');
        $stmt->execute(array(
            $id,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function insert_reservation_chambre($id_client, $id_salle, $datedeb, $datefin, $status)
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_chambre (id_client, id_chambre, date_debut_reservation_chambre, date_fin_reservation_chambre, status_chambre) VALUES (?, ?, ?, ?, ?);");
        $stmt->execute(array(
            $id_client,
            $id_salle,
            $datedeb,
            $datefin,
            $status
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function update_reservation_chambre($noccupe,$id)
    {
        $stmt = $this->bdd->prepare("UPDATE chambre SET occupe_chambre=".$noccupe." WHERE id_chambre = ".$id.";");
        $stmt->execute();
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

    //j'ai dabord supprimer les parent avent le client pour pas avoir d'erreur avec les cle primaire
    }
    public function get_total($boisson , $quantite){
        $stmt = $this->bdd->prepare('SELECT prix_un_boisson * ? AS total FROM boisson WHERE id_boisson = ?');
        $stmt->execute(array(
            $quantite,
            $boisson
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function get_total_menu($menu , $quantite){
        $stmt = $this->bdd->prepare('SELECT prix_un_menu * ? AS total FROM menu WHERE id_menu = ?');
        $stmt->execute(array(
            $quantite,
            $menu
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    public function insert_facture($id,$date,$total){
        $stmt = $this->bdd->prepare("INSERT INTO facture (id_client, date_facture, total_ttc) VALUES (?, ?, ?);");
        $stmt->execute(array(
            $id,
            $date,
            $total
        ));
    }
}
