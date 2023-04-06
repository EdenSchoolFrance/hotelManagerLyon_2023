<?php
namespace hotel\Models;

/** Class Client **/
class Client {

    private $id;
    private $nom;
    private $prenom;
    private $email;

    public function getId(){
        return $this->id;
    }

    public function getNom(){
        return $this->nom;
    }

    public function getPrenom(){
        return $this->prenom;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setId(){
        $this->id_client = $id;
    }

    public function setNom(){
        $this->nom_client = $nom;
    }

    public function setPrenom(){
        $this->prenom_client = $prenom;
    }

    public function setEmail(){
        $this->email_client = $email;
    }
}