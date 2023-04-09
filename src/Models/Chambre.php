<?php

namespace Hotel\Models;

class Chambre
{
    private $id_chambre;
    private $description_chambre;
    private $name_chambre;
    private $image_chambre;


    public function getImage_chambre()
    {
        return $this->image_chambre;
    }

    public function setImage_chambre($image_chambre)
    {
        return $this->image_chambre = $image_chambre;
    }

    public function getName_chambre()
    {
        return $this->name_chambre;
    }

    public function setName_chambre($name_chambre)
    {
        return $this->name_chambre = $name_chambre;
    }

    public function getDescription_chambre()
    {
        return $this->description_chambre;
    }

    public function setDescription_chambre($description_chambre)
    {
        return $this->description_chambre = $description_chambre;
    }

    public function getId_chambre()
    {
        return $this->id_chambre;
    }

    public function setId_chambre($id_chambre)
    {
        return $this->id_chambre = $id_chambre;
    }
}
