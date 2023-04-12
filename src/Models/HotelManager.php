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

    public function getAllChambres()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM chambre');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Chambre");
    }

    public function getChambre($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM chambre WHERE id_chambre = ?");
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Chambre");
        return $stmt->fetch();
    }

    public function getReservationsByChambre($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client_chambre JOIN client ON client_chambre.id_client = client.id_client WHERE id_chambre = ?");
        $stmt->execute(array(
            $id
        ));
        return $stmt;
    }

    public function validReserveChambre($num_reserv, $id_chambre, $id_client, $date_debut, $date_fin)
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_chambre(id_client, id_chambre, date_debut_reservation_chambre, date_fin_reservation_chambre, num_reservation_chambre, status_chambre) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute(array(
            $id_client,
            $id_chambre,
            $date_debut,
            $date_fin,
            $num_reserv,
            0,
        ));
    }
}
