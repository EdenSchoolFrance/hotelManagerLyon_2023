<?php
namespace hotel\Models;

/** Class Salle **/
class Salle {

    private $id_salle;
    private $name_salle;
    private $description_salle;
    private $type_salle;
    private $options_salle;


    public function getId_salle()
    {
        return $this->id_salle;
    }

    public function getName_salle()
    {
        return $this->name_salle;
    }

    public function getDescription_salle()
    {
        return $this->description_salle;
    }

    public function getType_salle()
    {
        return $this->type_salle;
    }

    public function getOptions_salle()
    {
        return $this->options_salle;
    }


    public function setId_salle($id_salle)
    {
        $this->id_salle = $id_salle;

        return $this;
    }

    public function setName_salle($name_salle)
    {
        $this->name_salle = $name_salle;

        return $this;
    }

    public function setDescription_salle($description_salle)
    {
        $this->description_salle = $description_salle;

        return $this;
    }

    public function setType_salle($type_salle)
    {
        $this->type_salle = $type_salle;

        return $this;
    }

    public function setOptions_salle($options_salle)
    {
        $this->options_salle = $options_salle;

        return $this;
    }
}