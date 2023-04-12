<?php
namespace hotel\Models;

class ClientManager{
    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function add(){

        $stmt = $this->bdd->prepare("INSERT INTO client(id_client, nom_client, prenom_client, email_client) VALUES (?, ?, ?, ?)");
                $stmt->execute(array(
                    uniqid(),
                    $_POST["nom"],
                    $_POST["prenom"],
                    $_POST["mail"],
                ));

        header("Location:/");
    }

    public function getAllClient(){
        $stmt = $this->bdd->prepare("SELECT * FROM client");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Client");

        return $stmt->fetchAll();
    }

    public function getClient($id){
        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE id_client = ?");
        $stmt->execute(array(
            $id,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Client");

        return $stmt->fetch();
    }

    public function delete($slug){
        $stmt = $this->bdd->prepare("DELETE FROM `client` WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));
    }

    public function update(){
        $stmt = $this->bdd->prepare("UPDATE client SET nom_client = ?, prenom_client = ?, email_client = ? WHERE id_client = ?");
        $stmt->execute(array(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["mail"],
            $_POST["id"],
        ));
    }

    public function getAllChambre(){
        $stmt = $this->bdd->prepare("SELECT * FROM chambre");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Chambre");

        return $stmt->fetchAll();
    }

    public function getAllPiscine(){
        $stmt = $this->bdd->prepare("SELECT * FROM piscine");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Piscine");

        return $stmt->fetchAll();
    }

    public function getAllSalle(){
        $stmt = $this->bdd->prepare("SELECT * FROM salle");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Salle");

        return $stmt->fetchAll();
    }

    public function addReservation(){
        if($_POST["chambre"] != "empty"){
            $stmt = $this->bdd->prepare("INSERT INTO client_chambre(id_client, id_chambre, date_debut_reservation_chambre, date_fin_reservation_chambre, status_chambre) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute(array(
                $_POST["clientId"],
                $_POST["chambre"],
                $_POST["chambreDateDebut"],
                $_POST["chambreDateFin"],
                "reserver",
            ));
        }
        if($_POST["piscine"] != "empty"){
            $stmt = $this->bdd->prepare("INSERT INTO client_piscine(id_client, id_piscine, date_debut_reservation_piscine, date_fin_reservation_piscine, status_piscine) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute(array(
                $_POST["clientId"],
                $_POST["piscine"],
                $_POST["piscineDateDebut"],
                $_POST["piscineDateFin"],
                "reserver",
            ));
        }
        if($_POST["salle"] != "empty"){
            $stmt = $this->bdd->prepare("INSERT INTO client_salle(id_client, id_salle, date_debut_reservation_salle, date_fin_reservation_salle, status_salle) VALUES (?, ?, ?, ?, ?)");
            $stmt->execute(array(
                $_POST["clientId"],
                $_POST["salle"],
                $_POST["salleDateDebut"],
                $_POST["salleDateFin"],
                "reserver",
            ));
        }
    }
}