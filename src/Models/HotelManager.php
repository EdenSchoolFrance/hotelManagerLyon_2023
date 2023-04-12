<?php
namespace Hotel\Models;

use DateTime;

/** Class HotelManager **/
class HotelManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getAllChambre(){
        $stmt = $this->bdd->prepare("SELECT * FROM `chambre`");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Hotel\Models\Chambre");
        return $stmt->fetchAll();
    }

    public function store($info){
        $stmt = $this->bdd->prepare("INSERT INTO `client`(`nom_client`, `prenom_client`, `email_client`, `téléphone`) VALUES (?,?,?,?)");
        $stmt->execute(array(
            $info["nom"],
            $info["prenom"],
            $info["mail"],
            $info["tel"]
        ));
    }

    public function addClientChambre($info){
        // $subscription_expiration_date = new DateTime($info["debut"]);
        // $now_date = new DateTime($info["fin"]);
        // $diff =  floor(($now_date->getTimestamp() - $subscription_expiration_date->getTimestamp()) / 86400);

        // $stmt = $this->bdd->prepare("UPDATE `chambre` SET `occupe_chambre`= 1 WHERE id_chambre = ?");
        // $stmt->execute(array(
        //     $info["id_chambre"]
        // ));

        // $stmt = $this->bdd->prepare("SELECT `name_chambre`, `prix_chambre` FROM `chambre` WHERE id_chambre = ?");
        // $stmt->execute(array(
        //     $info["id_chambre"]
        // ));
        // $stmt->setFetchMode(\PDO::FETCH_CLASS,"Hotel\Models\Chambre");
        // $res = $stmt->fetch();
        // $numChambre = $res->getName();
        // $prix = $res->getPrix() * $diff;        

        // $stmt = $this->bdd->prepare("INSERT INTO `client_chambre`(`id_client`, `id_chambre`, `date_debut_reservation_chambre`, `date_fin_reservation_chambre`, `num_reservation_chambre`, `status_chambre`) VALUES (?,?,?,?,?,?)");
        // $stmt->execute(array(
        //     $info["id_client"],
        //     $info["id_chambre"],
        //     $info["debut"],
        //     $info["fin"],
        //     $numChambre,
        //     "reserve"
        // ));

        // $stmt = $this->bdd->prepare("INSERT INTO `facture`(`id_client`, `num_reference`, `date_facture`, `total_ttc`) VALUES (?,?,NOW(),?)");
        // $stmt->execute(array(
        //     $info["id_client"],
        //     uniqid(),
        //     $prix
        // ));
    }
}