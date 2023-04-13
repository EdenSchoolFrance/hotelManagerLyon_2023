<?php
namespace hotel\Models;

/** Class Chambre **/
class Chambre {

    private $id_chambre;
    private $name_chambre;
    private $description_chambre;
    private $options_chambre;
    private $prix_chambre;
    private $occupe_chambre;
    private $categorie_chambre;
    private $date_debut_reservation_chambre;
    private $date_fin_reservation_chambre;

    public function getId_chambre()
    {
        return $this->id_chambre;
    }

    public function getName_chambre()
    {
        return $this->name_chambre;
    }

    public function getDescription_chambre()
    {
        return $this->description_chambre;
    }

    public function getOptions_chambre()
    {
        return $this->options_chambre;
    }

    public function getPrix_chambre()
    {
        return $this->prix_chambre;
    }

    public function getOccupe_chambre()
    {
        return $this->occupe_chambre;
    }

    public function getCategorie_chambre()
    {
        return $this->categorie_chambre;
    }


    public function setId_chambre($id_chambre)
    {
        $this->id_chambre = $id_chambre;
        return $this;
    }

    public function setName_chambre($name_chambre)
    {
        $this->name_chambre = $name_chambre;
        return $this;
    }

    public function setDescription_chambre($description_chambre)
    {
        $this->description_chambre = $description_chambre;
        return $this;
    }

    public function setOptions_chambre($options_chambre)
    {
        $this->options_chambre = $options_chambre;
        return $this;
    }

    public function setPrix_chambre($prix_chambre)
    {
        $this->prix_chambre = $prix_chambre;
        return $this;
    }

    public function setOccupe_chambre($occupe_chambre)
    {
        $this->occupe_chambre = $occupe_chambre;
        return $this;
    }

    public function setCategorie_chambre($categorie_chambre)
    {
        $this->categorie_chambre = $categorie_chambre;
        return $this;
    }



    public function getDate_debut_reservation_chambre()
    {
        return $this->date_debut_reservation_chambre;
    }

    public function setDate_debut_reservation_chambre($date_debut_reservation_chambre)
    {
        $this->date_debut_reservation_chambre = $date_debut_reservation_chambre;

        return $this;
    }

    public function getDate_fin_reservation_chambre()
    {
        return $this->date_fin_reservation_chambre;
    }

    public function setDate_fin_reservation_chambre($date_fin_reservation_chambre)
    {
        $this->date_fin_reservation_chambre = $date_fin_reservation_chambre;

        return $this;
    }
}