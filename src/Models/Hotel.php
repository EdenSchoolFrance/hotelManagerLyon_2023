<?php

namespace Hotel\Models;

class Hotel
{
    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $email_client;
    private $mdp_client;

    public function getIdClient()
    {
        return $this->id_client;
    }
    public function getNomClient()
    {
        return $this->nom_client ;
    }
    public function getPrenomClient()
    {
        return $this->prenom_client;
    }
    public function getEmailClient()
    {
        return $this->email_client;
    }
    public function getMdpClient()
    {
        return $this->mdp_client;
    }


    public function setIdDestination(string $id_client)
    {
        $this->id_client = $id_client;
    }
    public function setNomDestination(string $nom_client)
    {
        $this->nom_client = $nom_client;
    }
    public function setPrenomClient(string $prenom_client)
    {
        $this->prenom_client = $prenom_client;
    }
    public function setEmailClient(int $email_client)
    {
        $this->email_client = $email_client;
    }
    public function setMdpClient(string $mdp_client)
    {
        $this->mdp_client = $mdp_client;
    }
}
//controller set et get pour toute la class voyage