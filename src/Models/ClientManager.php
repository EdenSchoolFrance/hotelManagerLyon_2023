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
        $stmt = $this->bdd->prepare('SELECT * FROM client ORDER BY nom_client');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function showClientSpecific($slug)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client WHERE id_client = ?');
        $stmt->execute(array(
            $slug,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function find($prenom, $nom, $email)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE prenom_client = ? AND nom_client = ? AND email_client = ?");
        $stmt->execute(array(
            $prenom,
            $nom,
            $email
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function CreateClient($prenom, $nom, $email)
    {
        $stmt = $this->bdd->prepare('INSERT INTO `client` (`nom_client` , `prenom_client`, `email_client`) VALUE (?,?,?) ');
        $stmt->execute(array(
            $nom,
            $prenom,
            $email,

        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function delete_Client($id, $nom, $prenom, $email)
    {
        $stmt = $this->bdd->prepare('DELETE FROM `client` WHERE id_client = ? AND prenom_client = ? AND nom_client = ? AND email_client = ?');
        $stmt->execute(array(
            $id,
            $nom,
            $prenom,
            $email,

        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function reserve_chambres($user, $id_chambre, $deb_date, $fin_date, $num_reserve)
    {
        $stmt = $this->bdd->prepare('INSERT INTO `client_chambre`(`id_client`, `id_chambre`, `date_debut_reservation_chambre`, `date_fin_reservation_piscine_chambre`, `num_reservation_chambre`) VALUES (?,?,?,?,?)');
        $stmt->execute(array(
            $user,
            $id_chambre,
            $deb_date,
            $fin_date,
            $num_reserve,
        ));

        $stmt = $this->bdd->prepare('UPDATE `chambre` SET `occupe_chambre`= :occupe WHERE `id_chambre` = :id_chambre');
        $stmt->execute(array(
            'occupe' => 1,
            ':id_chambre' => $id_chambre,
        ));
        return;
    }
}
