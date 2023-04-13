<?php

namespace Hotel\Models;

/** Class Salle **/
class Salle
{

    private $id_salle;
    private $name_salle;
    private $description_salle;
    private $image_salle;
    private $type_salle;
    private $option_salle;

    //GET
    public function getId()
    {
        return $this->id_salle;
    }
    public function getName()
    {
        return $this->name_salle;
    }
    public function getDesc()
    {
        return $this->description_salle;
    }
    public function getImg()
    {
        return $this->image_salle;
    }
    public function getType()
    {
        return $this->type_salle;
    }
    public function getOption()
    {
        return $this->option_salle;
    }

    //SET
    public function setId(Int $id)
    {
        $this->id_salle = $id;
    }
    public function setName(String $name)
    {
        $this->name_salle = $name;
    }
    public function setDesc(String $desc)
    {
        $this->description_salle = $desc;
    }
    public function setImg(String $img)
    {
        $this->image_salle = $img;
    }
    public function setType(String $type)
    {
        $this->type_salle = $type;
    }
    public function setOption(String $option)
    {
        $this->option_salle = $option;
    }
}
