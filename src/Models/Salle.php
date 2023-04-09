<?php

namespace Hotel\Models;

class salle
{
    private $id_salle;
    private $description_salle;
    private $name_salle;
    private $image_salle;


    public function getId_salle()
    {
        return $this->id_salle;
    }

    public function setId_salle($id_salle)
    {
        return $this->id_salle = $id_salle;
    }

    public function getDescription_salle()
    {
        return $this->description_salle;
    }

    public function setDescription_salle($description_salle)
    {
        return $this->description_salle = $description_salle;
    }

    public function getName_salle()
    {
        return $this->name_salle;
    }

    public function setName_salle($name_salle)
    {
        return $this->name_salle = $name_salle;
    }

    public function getImage_salle()
    {
        return $this->image_salle;
    }

    public function setImage_salle($image_salle)
    {
        return $this->image_salle = $image_salle;
    }
}
