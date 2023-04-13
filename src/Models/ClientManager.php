<?php
namespace Hotel\Models;

/** Class ClientManager **/
class ClientManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function find($id, $nom){
        $stmt = $this->bdd->prepare("SELECT * FROM `client` WHERE id_client = ? AND nom_client = ?");
        $stmt->execute(array(
            $id,
            $nom
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Hotel\Models\Client");
        return $stmt->fetch()->getTel();
    }

    public function insert($nom, $prenom, $email, $num){
        try {
            $stmt = $this->bdd->prepare("INSERT INTO `client`(`nom_client`, `prenom_client`, `email_client`, `téléphone`) VALUES (?,?,?,?)");
            $stmt->execute(array(
                $nom, 
                $prenom, 
                $email, 
                $num
            ));
            return true;
        } catch (\Throwable $th) {
            return false;
        }
    }

    public function delete($nom, $prenom, $num){
        $stmt = $this->bdd->prepare("DELETE FROM `client` WHERE nom_client = ? AND prenom_client = ? AND téléphone = ?");
        $stmt->execute(array(
            $nom, 
            $prenom, 
            $num
        ));
        return true;
    }

    public function removeClient($id){

        $stmt = $this->bdd->prepare("DELETE FROM `client_chambre` WHERE id_client = ?");
        $stmt->execute(array(
            $id
        ));

        $stmt = $this->bdd->prepare("DELETE FROM `client_boisson` WHERE id_client = ?");
        $stmt->execute(array(
            $id
        ));

        $stmt = $this->bdd->prepare("DELETE FROM `client_menu` WHERE id_client = ?");
        $stmt->execute(array(
            $id
        ));

        $stmt = $this->bdd->prepare("DELETE FROM `client_piscine` WHERE id_client = ?");
        $stmt->execute(array(
            $id
        ));

        $stmt = $this->bdd->prepare("DELETE FROM `client_salle` WHERE id_client = ?");
        $stmt->execute(array(
            $id
        ));

        $stmt = $this->bdd->prepare("DELETE FROM `facture` WHERE id_client = ?");
        $stmt->execute(array(
            $id
        ));

        $stmt = $this->bdd->prepare("DELETE FROM `client` WHERE id_client = ?");
        $stmt->execute(array(
            $id
        ));
    }

    public function getAll(){
        $stmt = $this->bdd->prepare("SELECT * FROM `client`");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Hotel\Models\Client");
        return $stmt->fetchAll();
    }
}