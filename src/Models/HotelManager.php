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

    public function getAllSalle(){
        $stmt = $this->bdd->prepare("SELECT * FROM `salle`");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Hotel\Models\Salle");
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
        $subscription_expiration_date = new DateTime($info["debut"]);
        $now_date = new DateTime($info["fin"]);
        $diff =  floor(($now_date->getTimestamp() - $subscription_expiration_date->getTimestamp()) / 86400);
        $stmt = $this->bdd->prepare(
            "SELECT * FROM `client_chambre` 
            WHERE id_chambre = ? AND ((`date_debut_reservation_chambre` <= ? AND `date_fin_reservation_chambre` >= ?) 
            OR (`date_debut_reservation_chambre` <= ? AND `date_fin_reservation_chambre` >= ?) 
            OR (`date_debut_reservation_chambre` >= ? AND `date_fin_reservation_chambre` <= ?))"
        );
        $stmt->execute(array(
            $info["id_chambre"],
            $info["debut"],
            $info["debut"],
            $info["fin"],
            $info["fin"],
            $info["debut"],
            $info["fin"]
        ));

        if(!$stmt->fetch()){
            $stmt = $this->bdd->prepare("SELECT `prix_chambre` FROM `chambre` WHERE id_chambre = ?");
            $stmt->execute(array(
                $info["id_chambre"]
            ));

            $stmt->setFetchMode(\PDO::FETCH_CLASS,"Hotel\Models\Chambre");
            $prix = $stmt->fetch()->getPrix() * $diff;        

            $stmt = $this->bdd->prepare("INSERT INTO `client_chambre`(`id_client`, `id_chambre`, `date_debut_reservation_chambre`, `date_fin_reservation_chambre`, `status_chambre`) VALUES (?,?,?,?,?)");
            $stmt->execute(array(
                $info["id_client"],
                $info["id_chambre"],
                $info["debut"],
                $info["fin"],
                "reserve"
            ));

            $stmt = $this->bdd->prepare("INSERT INTO `facture`(`id_client`, `num_reference`, `date_facture`, `total_ttc`) VALUES (?,?,NOW(),?)");
            $stmt->execute(array(
                $info["id_client"],
                uniqid(),
                $prix
            ));

            $_SESSION["success"] = "Client bien ajouté !";
            header("Location: /chambre");
        } else{
            $_SESSION["erreur"] = "La date demandé est déjà prise";
            header("Location: /chambre");
        }
    }

    public function addClientSalle($info){
        $subscription_expiration_date = new DateTime($info["debut"]);
        $now_date = new DateTime($info["fin"]);
        $diff =  floor(($now_date->getTimestamp() - $subscription_expiration_date->getTimestamp()) / 86400);
        $stmt = $this->bdd->prepare(
            "SELECT * FROM `client_salle` 
            WHERE id_salle = ? AND ((`date_debut_reservation_salle` <= ? AND `date_fin_reservation_salle` >= ?) 
            OR (`date_debut_reservation_salle` <= ? AND `date_fin_reservation_salle` >= ?) 
            OR (`date_debut_reservation_salle` >= ? AND `date_fin_reservation_salle` <= ?))"
        );
        $stmt->execute(array(
            $info["id_salle"],
            $info["debut"],
            $info["debut"],
            $info["fin"],
            $info["fin"],
            $info["debut"],
            $info["fin"]
        ));

        if(!$stmt->fetch()){
            $stmt = $this->bdd->prepare("INSERT INTO `client_salle`(`id_client`, `id_salle`, `date_debut_reservation_salle`, `date_fin_reservation_salle`, `status_salle`) VALUES (?,?,?,?,?)");
            $stmt->execute(array(
                $info["id_client"],
                $info["id_salle"],
                $info["debut"],
                $info["fin"],
                "reserve"
            ));

            $_SESSION["success"] = "Salle bien réservée !";
            header("Location: /salle");
        } else{
            $_SESSION["erreur"] = "La date demandé est déjà prise";
            header("Location: /salle");
        }
    }
}