<?php
namespace hotel\Models;

class ClientManager{
    private $bdd;

    //base de donnée
    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd()
    {
        return $this->bdd;
    }

     //---------- Gestion client ---------

    //Ajoute un client à la basez de donnée
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

    //Recupère tout les client
    public function getAllClient(){
        $stmt = $this->bdd->prepare("SELECT * FROM client");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Client");

        return $stmt->fetchAll();
    }

    //Recupère un client en question
    public function getClient($id){
        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE id_client = ?");
        $stmt->execute(array(
            $id,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Client");

        return $stmt->fetch();
    }

    //Supression complete d'un client avec tout ses commandes et reservations
    public function delete($slug){

        $stmt = $this->bdd->prepare("DELETE FROM client_boisson WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));

        $stmt = $this->bdd->prepare("DELETE FROM client_chambre WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));

        $stmt = $this->bdd->prepare("DELETE FROM client_salle WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));

        $stmt = $this->bdd->prepare("DELETE FROM client_piscine WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));

        $stmt = $this->bdd->prepare("DELETE FROM client_menu WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));

        $stmt = $this->bdd->prepare("DELETE FROM facture WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));

        $stmt = $this->bdd->prepare("DELETE FROM `client` WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));
    }

    //Mis à jour d'un client
    public function update(){
        $stmt = $this->bdd->prepare("UPDATE client SET nom_client = ?, prenom_client = ?, email_client = ? WHERE id_client = ?");
        $stmt->execute(array(
            $_POST["nom"],
            $_POST["prenom"],
            $_POST["mail"],
            $_POST["id"],
        ));
    }

    //---------- Get all: chambre, piscine, salle, boisson, menu ---------

    //Recupère toute les chamnbres
    public function getAllChambre(){
        $stmt = $this->bdd->prepare("SELECT * FROM chambre");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Chambre");

        return $stmt->fetchAll();
    }

    //Recupère toute les piscines
    public function getAllPiscine(){
        $stmt = $this->bdd->prepare("SELECT * FROM piscine");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Piscine");

        return $stmt->fetchAll();
    }

    //Recupère toute les salles
    public function getAllSalle(){
        $stmt = $this->bdd->prepare("SELECT * FROM salle");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Salle");

        return $stmt->fetchAll();
    }

    //Recupère toute les boissons
    public function getAllBoisson(){
        $stmt = $this->bdd->prepare("SELECT * FROM boisson");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Boisson");

        return $stmt->fetchAll();
    }

    //Recupère toute les menus
    public function getAllMenu(){
        $stmt = $this->bdd->prepare("SELECT * FROM menu");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Menu");

        return $stmt->fetchAll();
    }

    // Ajouter une reservation dans la table client_chambre, client_piscine et client_salle
    public function addReservation(){
        //Gestion chambre
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
        //Gestion piscine
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
        //Gestion salle
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

    // ---------- Gestion des commandes ---------

    // Ajoute une commande dans la table client_boisson
    public function addCommandeBoisson(){
        $boissonId = $_POST["boissonId"];
        $stmt = $this->bdd->prepare("INSERT INTO client_boisson(id_client, id_boisson, quantite_client_boisson, date_client_boisson) VALUES (?, ?, ?, ?)");
        $stmt->execute(array(
            $_POST["clientId"],
            $boissonId,
            $_POST[$boissonId],
            date('Y-m-d'),
        ));
    }

    // Ajoute une commande dans la table client_menu
    public function addCommandeMenu(){
        $menuId = $_POST["menuId"];
        $stmt = $this->bdd->prepare("INSERT INTO client_menu(id_client, id_menu, quantite_client_menu, date_client_menu) VALUES (?, ?, ?, ?)");
        $stmt->execute(array(
            $_POST["clientId"],
            $menuId,
            $_POST[$menuId],
            date('Y-m-d'),
        ));
    }

    // -------- Facture --------

    //Recupère la facture du client
    public function getFacture($id){
        $stmt = $this->bdd->prepare("SELECT * FROM facture WHERE id_client = ?");
        $stmt->execute(array(
            $id,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\Facture");

        return $stmt->fetchAll();
    }

    //Créer la facture
    public function addFacture(){
        $stmt = $this->bdd->prepare("INSERT INTO facture(id_facture, id_client, num_reference, date_facture, total_ttc) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array(
            uniqid(),
            $_POST["clientId"],
            uniqid(),
            date('Y-m-d'),
            $_POST["total"],
        ));
    }

    //----------- Recupère les info pour la facture -----------------

    //get client boisson
    public function getClient_boisson($id){
        $stmt = $this->bdd->prepare("SELECT * FROM client_boisson JOIN boisson ON client_boisson.id_boisson = boisson.id_boisson WHERE id_client = ?");
        $stmt->execute(array(
            $id,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\boisson");

        return $stmt->fetchAll();
    }

    //get client chambre
    public function getClient_chambre($id){
        $stmt = $this->bdd->prepare("SELECT * FROM client_chambre JOIN chambre ON client_chambre.id_chambre = chambre.id_chambre WHERE id_client = ?");
        $stmt->execute(array(
            $id,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\chambre");

        return $stmt->fetchAll();
    }

    //get client menu
    public function getClient_menu($id){
        $stmt = $this->bdd->prepare("SELECT * FROM client_menu JOIN menu ON client_menu.id_menu = menu.id_menu WHERE id_client = ?");
        $stmt->execute(array(
            $id,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\menu");

        return $stmt->fetchAll();
    }

    //get client piscine
    public function getClient_piscine($id){
        $stmt = $this->bdd->prepare("SELECT * FROM client_piscine JOIN piscine ON client_piscine.id_piscine = piscine.id_piscine WHERE id_client = ?");
        $stmt->execute(array(
            $id,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\piscine");

        return $stmt->fetchAll();
    }

    //get client salle
    public function getClient_salle($id){
        $stmt = $this->bdd->prepare("SELECT * FROM client_salle JOIN salle ON client_salle.id_salle = salle.id_salle WHERE id_client = ?");
        $stmt->execute(array(
            $id,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"hotel\Models\salle");

        return $stmt->fetchAll();
    }
}