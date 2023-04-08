<?php
namespace hotel\Models;

/** Class Client **/
class Client {

    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $email_client;

    public function getId(){
        return $this->id_client;
    }

    public function getNom(){
        return $this->nom_client;
    }

    public function getPrenom(){
        return $this->prenom_client;
    }

    public function getEmail(){
        return $this->email_client;
    }

    public function setId(){
        $this->id_client = $id_client;
    }

    public function setNom(){
        $this->nom_client = $nom_client;
    }

    public function setPrenom(){
        $this->prenom_client = $prenom_client;
    }

    public function setEmail(){
        $this->email_client = $email_client;
    }
}