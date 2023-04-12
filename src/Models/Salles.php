<?php

namespace Hotel\Models;

class Salles
{
    private $id_salle;
    private $name_salle;
    private $description_salle;
    private $image_salle;
    private $type_salle;
    private $options_salle;

    public function getIdSalle()
    {
        return $this->id_salle;
    }

    public function setIdSalle($id_salle)
    {
        $this->id_salle = $id_salle;
    }

    public function getNameSalle()
    {
        return $this->name_salle;
    }

    public function setNameSalle($name_salle)
    {
        $this->name_salle = $name_salle;
    }

    public function getDescriptionSalle()
    {
        return $this->description_salle;
    }

    public function setDescriptionSalle($description_salle)
    {
        $this->description_salle = $description_salle;
    }

    public function getImageSalle()
    {
        return $this->image_salle;
    }

    public function setImageSalle($image_salle)
    {
        $this->image_salle = $image_salle;
    }

    public function getTypeSalle()
    {
        return $this->type_salle;
    }

    public function setTypeSalle($type_salle)
    {
        $this->type_salle = $type_salle;
    }

    public function getOptionsSalle()
    {
        return $this->options_salle;
    }

    public function setOptionsSalle($options_salle)
    {
        $this->options_salle = $options_salle;
    }
}
