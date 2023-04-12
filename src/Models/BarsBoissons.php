<?php

namespace Hotel\Models;

class BarsBoissons
{
    //BOISSONS
    private $id_boisson;
    private $name_boisson;
    private $description_boisson;
    private $image_boisson;
    private $prix_boisson;

    //BARS
    private $id_bar;
    private $name_bar;

    public function getIdBoisson()
    {
        return $this->id_boisson;
    }

    public function setIdBoisson($id_boisson)
    {
        return $this->id_boisson = $id_boisson;
    }

    public function getNameBoisson()
    {
        return $this->name_boisson;
    }

    public function setNameBoisson($name_boisson)
    {
        return $this->name_boisson = $name_boisson;
    }

    public function getDescriptionBoisson()
    {
        return $this->description_boisson;
    }

    public function setDescriptionBoisson($description_boisson)
    {
        return $this->description_boisson = $description_boisson;
    }

    public function getImageBoisson()
    {
        return $this->image_boisson;
    }

    public function setImageBoisson($image_boisson)
    {
        return $this->image_boisson = $image_boisson;
    }

    public function getPrixBoisson()
    {
        return $this->prix_boisson;
    }

    public function setPrixBoisson($prix_boisson)
    {
        return $this->prix_boisson = $prix_boisson;
    }

    //BARS

    public function getIdBar()
    {
        return $this->id_bar;
    }

    public function setIdBar($id_bar)
    {
        return $this->id_bar = $id_bar;
    }

    public function getNameBar()
    {
        return $this->name_bar;
    }

    public function setNameBar($name_bar)
    {
        return $this->name_bar = $name_bar;
    }
}
