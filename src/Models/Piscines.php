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

    public function getid_piscine()
    {
        return $this->id_piscine;
    }
    public function getname_piscine()
    {
        return $this->name_piscine;
    }
    public function getdescription_piscine()
    {
        return $this->description_piscine;
    }
    public function getimage_piscine()
    {
        return $this->image_piscine;
    }
    public function getouverture_piscine()
    {
        return $this->ouverture_piscine;
    }
    public function getfermeture_piscine()
    {
        return $this->fermeture_piscine;
    }
    public function getnettoyage_piscine()
    {
        return $this->nettoyage_piscine;
    }


    public function setid_piscine(string $id_piscine)
    {
        $this->id_piscine = $id_piscine;
    }
    public function setname_piscine(string $name_piscine)
    {
        $this->name_piscine = $name_piscine;
    }
    public function setdescription_piscine(string $description_piscine)
    {
        $this->description_piscine = $description_piscine;
    }
    public function setimage_piscine(string $image_piscine)
    {
        $this->image_piscine = $image_piscine;
    }
    public function setouverture_piscine(string $ouverture_piscine)
    {
        $this->ouverture_piscine = $ouverture_piscine;
    }
    public function setfermeture_piscine(string $fermeture_piscine)
    {
        $this->fermeture_piscine = $fermeture_piscine;
    }
    public function setnettoyage_piscine(string $nettoyage_piscine)
    {
        $this->nettoyage_piscine = $nettoyage_piscine;
    }
}
//controller set et get pour toute la class client