<?php

namespace Hotel\Models;

/** Class des clients **/
class Client
{

    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $email_client;
    private $mdp_client;

    public function getid_client()
    {
        return $this->id_client;
    }
    public function getnom_client()
    {
        return $this->nom_client;
    }
    public function getprenom_client()
    {
        return $this->prenom_client;
    }
    public function getemail_client()
    {
        return $this->email_client;
    }
    public function getmdp_client()
    {
        return $this->mdp_client;
    }


    public function setid_client(string $id_client)
    {
        $this->id_client = $id_client;
    }
    public function setnom_client(string $nom_client)
    {
        $this->nom_client = $nom_client;
    }
    public function setprenom_client(string $prenom_client)
    {
        $this->prenom_client = $prenom_client;
    }
    public function setemail_client(string $email_client)
    {
        $this->email_client = $email_client;
    }
    public function setmdp_client(string $mdp_client)
    {
        $this->mdp_client = $mdp_client;
    }
}
//controller set et get pour tous les clients