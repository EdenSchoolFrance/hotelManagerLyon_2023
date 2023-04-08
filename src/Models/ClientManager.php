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

    public function delete($slug){
        $stmt = $this->bdd->prepare("DELETE FROM `client` WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));
    }
}