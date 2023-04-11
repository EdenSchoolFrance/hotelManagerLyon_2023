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


    public function getid_salle()
    {
        return $this->id_salle;
    }
    public function getname_salle()
    {
        return $this->name_salle;
    }
    public function getdescription_salle()
    {
        return $this->description_salle;
    }
    public function getimage_salle()
    {
        return $this->image_salle;
    }
    public function gettype_salle()
    {
        return $this->type_salle;
    }
    public function getoptions_salle()
    {
        return $this->options_salle;
    }


    public function setid_salle(string $id_salle)
    {
        $this->id_salle = $id_salle;
    }
    public function setname_salle(string $name_salle)
    {
        $this->name_salle = $name_salle;
    }
    public function setdescription_salle(string $description_salle)
    {
        $this->description_salle = $description_salle;
    }
    public function setimage_salle(string $image_salle)
    {
        $this->image_salle = $image_salle;
    }
    public function settype_salle(string $type_salle)
    {
        $this->type_salle = $type_salle;
    }
    public function setoptions_salle(string $options_salle)
    {
        $this->options_salle = $options_salle;
    }
}
//controller set et get pour toute la class client