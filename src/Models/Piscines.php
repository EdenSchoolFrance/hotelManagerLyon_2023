<?php

namespace Hotel\Models;

class Piscines
{
    private $id_piscine;
    private $name_piscine;
    private $description_piscine;
    private $image_piscine;
    private $ouverture_piscine;
    private $fermeture_piscine;
    private $nettoyage_piscine;

    public function getIdPiscine()
    {
        return $this->id_piscine;
    }

    public function setIdPiscine($id_piscine)
    {
        return $this->id_piscine = $id_piscine;
    }

    public function getNamePiscine()
    {
        return $this->name_piscine;
    }

    public function setNamePiscine($name_piscine)
    {
        return $this->name_piscine = $name_piscine;
    }

    public function getDescriptionPiscine()
    {
        return $this->description_piscine;
    }

    public function setDescriptionPiscine($description_piscine)
    {
        return $this->description_piscine = $description_piscine;
    }

    public function getImagePiscine()
    {
        return $this->image_piscine;
    }

    public function setImagePiscine($image_piscine)
    {
        return $this->image_piscine = $image_piscine;
    }

    public function getOuverturePiscine()
    {
        return $this->ouverture_piscine;
    }

    public function setOuverturePiscine($ouverture_piscine)
    {
        return $this->ouverture_piscine = $ouverture_piscine;
    }

    public function getFermeturePiscine()
    {
        return $this->fermeture_piscine;
    }

    public function setFermeturePiscine($fermeture_piscine)
    {
        return $this->fermeture_piscine = $fermeture_piscine;
    }

    public function getNettoyagePiscine()
    {
        return $this->nettoyage_piscine;
    }

    public function setNettoyagePiscine($nettoyage_piscine)
    {
        return $this->nettoyage_piscine = $nettoyage_piscine;
    }
}
