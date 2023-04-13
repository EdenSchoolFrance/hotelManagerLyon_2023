<?php

namespace Hotel\Models;

use Hotel\Models\Hotel;

/** Class SalleManager **/
class SalleManager
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getAllSalles()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM salle');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Salle");
    }

    public function getSalle($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM salle WHERE id_salle = ?");
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Salle");
        return $stmt->fetch();
    }

    public function getReservationsBySalle($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client_salle JOIN client ON client_salle.id_client = client.id_client WHERE id_salle = ?");
        $stmt->execute(array(
            $id
        ));
        return $stmt;
    }

    public function validReserveSalle($num_reserv, $id_salle, $id_client, $date_debut, $date_fin)
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_salle(id_client, id_salle, date_debut_reservation_salle, date_fin_reservation_salle, num_reservation_salle) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array(
            $id_client,
            $id_salle,
            $date_debut,
            $date_fin,
            $num_reserv,
        ));
    }
}
