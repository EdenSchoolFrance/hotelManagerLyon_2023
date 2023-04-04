<?php
namespace Hotel\Models;

/** Class Client **/
class Client {

    private $id_client; // id du client
    private $nom_client;// nom du client
    private $prenom_client; // prénom du client
    private $email_client; // email du client
    private $téléphone; // numéro de téléphone du client

    public function getId() {
        return $this->id_client;
    }

    public function getName() {
        return $this->nom_client;
    }

    public function getPrenom() {
        return $this->prenom_client;
    }

    public function getMail() {
        return $this->email_client;
    }
    
    public function getTel(){
        return $this->téléphone;
    }

    public function setId(Int $id) {
        $this->id_client = $id;
    }

    public function setName(string $nom) {
        $this->nom_client = $nom;
    }

    public function setPrenom(string $desc) {
        $this->prenom_client = $desc;
    }

    public function setMail(string $mail) {
        $this->email_client = $mail;
    }

    public function setTel(string $i){
        $this->téléphone = $i;
    }

}
