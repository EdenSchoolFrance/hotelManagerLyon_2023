<?php

namespace Hotel\Models;

class Clients
{
    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $email_client;

    public function getIdClient()
    {
        return $this->id_client;
    }

    public function setIdClient($id_client)
    {
        $this->id_client = $id_client;
    }

    public function getNomClient()
    {
        return $this->nom_client;
    }

    public function setNomClient($nom_client)
    {
        $this->nom_client = $nom_client;
    }

    public function getPrenomClient()
    {
        return $this->prenom_client;
    }

    public function setPrenomClient($prenom_client)
    {
        $this->prenom_client = $prenom_client;
    }

    public function getEmailClient()
    {
        return $this->email_client;
    }

    public function setEmailClient($email_client)
    {
        $this->email_client = $email_client;

    }
}
