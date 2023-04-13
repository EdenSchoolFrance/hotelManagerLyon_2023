<?php
namespace hotel\Models;

/** Class Piscine **/
class Piscine {

    private $id_piscine;
    private $name_piscine;
    private $description_piscine;
    private $ouverture_piscine;
    private $fermeture_piscine;
    private $nettoyage_piscine;
    private $prix_piscine;
    private $date_debut_reservation_piscine;
    private $date_fin_reservation_piscine;


    public function getId_piscine()
    {
        return $this->id_piscine;
    }

    public function getName_piscine()
    {
        return $this->name_piscine;
    }

    public function getDescription_piscine()
    {
        return $this->description_piscine;
    }

    public function getOuverture_piscine()
    {
        return $this->ouverture_piscine;
    }

    public function getFermeture_piscine()
    {
        return $this->fermeture_piscine;
    }

    public function getNettoyage_piscine()
    {
        return $this->nettoyage_piscine;
    }

    
    public function setId_piscine($id_piscine)
    {
        $this->id_piscine = $id_piscine;

        return $this;
    }

    public function setName_piscine($name_piscine)
    {
        $this->name_piscine = $name_piscine;

        return $this;
    }

    public function setDescription_piscine($description_piscine)
    {
        $this->description_piscine = $description_piscine;

        return $this;
    }

    public function setOuverture_piscine($ouverture_piscine)
    {
        $this->ouverture_piscine = $ouverture_piscine;

        return $this;
    }

    public function setFermeture_piscine($fermeture_piscine)
    {
        $this->fermeture_piscine = $fermeture_piscine;

        return $this;
    }

    public function setNettoyage_piscine($nettoyage_piscine)
    {
        $this->nettoyage_piscine = $nettoyage_piscine;

        return $this;
    }

    
    public function getPrix_piscine()
    {
        return $this->prix_piscine;
    }

    public function setPrix_piscine($prix_piscine)
    {
        $this->prix_piscine = $prix_piscine;

        return $this;
    }

    public function getDate_debut_reservation_piscine()
    {
        return $this->date_debut_reservation_piscine;
    }

    public function setDate_debut_reservation_piscine($date_debut_reservation_piscine)
    {
        $this->date_debut_reservation_piscine = $date_debut_reservation_piscine;

        return $this;
    }

    public function getDate_fin_reservation_piscine()
    {
        return $this->date_fin_reservation_piscine;
    }

    public function setDate_fin_reservation_piscine($date_fin_reservation_piscine)
    {
        $this->date_fin_reservation_piscine = $date_fin_reservation_piscine;

        return $this;
    }
}