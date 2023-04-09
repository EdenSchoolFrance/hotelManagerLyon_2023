<?php

namespace Hotel\Models;

class piscine
{
    private $id_piscine;
    private $description_piscine;
    private $name_piscine;
    private $image_piscine;

    

    public function getId_piscine()
    {
        return $this->id_piscine;
    }

    public function setId_piscine($id_piscine)
    {
        return $this->id_piscine = $id_piscine;
    }

    public function getDescription_piscine()
    {
        return $this->description_piscine;
    }

    public function setDescription_piscine($description_piscine)
    {
        return $this->description_piscine = $description_piscine;
    }

    public function getName_piscine()
    {
        return $this->name_piscine;
    }

    public function setName_piscine($name_piscine)
    {
        return $this->name_piscine = $name_piscine;
    }

    public function getImage_piscine()
    {
        return $this->image_piscine;
    }

    public function setImage_piscine($image_piscine)
    {
        return $this->image_piscine = $image_piscine;
    }
}
