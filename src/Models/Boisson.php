<?php

namespace Hotel\Models;

class Boisson
{
    private $id_boisson;
    private $description_boisson;
    private $name_boisson;
    private $image_boisson;

 

    public function getImage_boisson()
    {
        return $this->image_boisson;
    }

    public function setImage_boisson($image_boisson)
    {
        return $this->image_boisson = $image_boisson;
    }

    public function getName_boisson()
    {
        return $this->name_boisson;
    }

    public function setName_boisson($name_boisson)
    {
        return $this->name_boisson = $name_boisson;
    }

    public function getDescription_boisson()
    {
        return $this->description_boisson;
    }

    public function setDescription_boisson($description_boisson)
    {
        return $this->description_boisson = $description_boisson;
    }

    public function getId_boisson()
    {
        return $this->id_boisson;
    }

    public function setId_boisson($id_boisson)
    {
        return $this->id_boisson = $id_boisson;
    }
}
