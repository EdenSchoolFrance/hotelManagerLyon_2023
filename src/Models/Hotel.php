<?php

namespace Hotel\Models;

class Hotel
{
    //table client
    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $email_client;
    private $mdp_client;

    //table client_salle
    private $date_debut_reservation_salle;
    private $date_fin_reservation_salle;
    private $num_reservation_salle;
    private $status_salle;

    //table salle
    private $id_salle;
    private $name_salle;
    private $description_salle;
    private $image_salle;
    private $type_salle;
    private $options_salle;

    //table client
    //get
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

    //set
    public function setIdClient(string $id_client)
    {
        $this->id_client = $id_client;
    }
    public function setNomClient(string $nom_client)
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
    
    //table client_salle
    //get
    
    public function getNumReservationSalle()
    {
        return $this->num_reservation_salle;
    }
    public function getDateDebutReservationSalle()
    {
        return $this->date_debut_reservation_salle;
    }
    public function getDateFinReservationSalle()
    {
        return $this->date_fin_reservation_salle;
    }
    public function getStatusSalle()
    {
        return $this->status_salle;
    }
    
    //set
    
    public function setNumReservationSalle($num_reservation_salle)
    {
        $this->num_reservation_salle = $num_reservation_salle;
    }
    public function setDateDebutReservationSalle($date_debut_reservation_salle)
    {
        $this->date_debut_reservation_salle = $date_debut_reservation_salle;
    }
    public function setDateFinReservationSalle($date_fin_reservation_salle)
    {
        $this->date_fin_reservation_salle = $date_fin_reservation_salle;
    }
    public function setStatusSalle($status_salle)
    {
        $this->status_salle = $status_salle;
    }
    
    //table salle
    //get
    public function getIdSalle()
    {
        return $this->id_salle;
    }
    public function getNameSalle()
    {
        return $this->name_salle ;
    }
    public function getDescriptionSalle()
    {
        return $this->description_salle;
    }
    public function getImageSalle()
    {
        return $this->image_salle;
    }
    public function getTypeSalle()
    {
        return $this->type_salle;
    }
    public function getOptionsSalle()
    {
        return $this->options_salle;
    }

    //set
    public function setIdSalle($id_salle)
    {
        $this->id_salle = $id_salle;
    }
    public function setNameSalle($name_salle)
    {
        $this->name_salle = $name_salle;
    }
    public function setDescriptionSalle($description_salle)
    {
        $this->description_salle = $description_salle;
    }
    public function setImageSalle($image_salle)
    {
        $this->image_salle = $image_salle;
    }
    public function setTypeSalle($type_salle)
    {
        $this->type_salle = $type_salle;
    }
    public function setOptionsSalle($options_salle)
    {
        $this->options_salle = $options_salle;
    }
}