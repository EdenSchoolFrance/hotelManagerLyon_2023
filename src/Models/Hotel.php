<?php

namespace Hotel\Models;

/** Class Hotel **/
class Hotel
{

    // Methodes

    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $email_client;

    // Accesseurs

    // Id_client
    public function getIdClient()
    {
        return $this->id_client;
    }

    public function setIdClient(String $id_client)
    {
        $this->id_client = $id_client;
    }

    // Nom Client
    public function getNomClient()
    {
        return $this->nom_client;
    }

    public function setNomClient(String $nom_client)
    {
        $this->nom_client = $nom_client;
    }

    // Prenom Client
    public function getPrenomClient()
    {
        return $this->prenom_client;
    }

    public function setPrenomClient(String $prenom_client)
    {
        $this->prenom_client = $prenom_client;
    }

    // Email Client
    public function getMailClient()
    {
        return $this->email_client;
    }

    public function setMailClient(String $email_client)
    {
        $this->email_client = $email_client;
    }
}
