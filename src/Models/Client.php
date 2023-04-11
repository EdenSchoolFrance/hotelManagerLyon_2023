<?php

namespace Hotel\Models;

/** Class Client **/
class Client
{

    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $email_client;
    private $mdp_client;

    public function getId()
    {
        return $this->id_client;
    }

    public function getNom()
    {
        return $this->nom_client;
    }

    public function getPrenom()
    {
        return $this->prenom_client;
    }

    public function getMail()
    {
        return $this->email_client;
    }

    public function getMdp()
    {
        return $this->mdp_client;
    }


    public function setId(Int $id)
    {
        $this->id_client = $id;
    }

    public function setNom(String $nom)
    {
        $this->nom_client = $nom;
    }

    public function setPrenom(String $prenom)
    {
        $this->prenom_client = $prenom;
    }

    public function setMail(String $mail)
    {
        $this->email_client = $mail;
    }

    public function setMdp(String $mdp)
    {
        $this->mdp_client = $mdp;
    }
}
