<?php
namespace Hotel\Models;

/** Class HotelManager **/
class HotelManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
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
}