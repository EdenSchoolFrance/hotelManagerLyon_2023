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


    public function getAll(){
        $stmt = $this->bdd->prepare("SELECT * FROM `client`");
        $stmt->execute();
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Hotel\Models\Client");
        return $stmt->fetchAll();
    }
}