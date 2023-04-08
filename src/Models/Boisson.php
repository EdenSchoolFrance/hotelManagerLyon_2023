<?php

namespace Hotel\Models;

class Boisson
{
    private $id_boisson;
    private $description_boisson;
    private $name_boisson;
    private $image_boisson;

    /**
     * Get the value of image_boisson
     */ 
    public function getImage_boisson()
    {
        return $this->image_boisson;
    }

    /**
     * Set the value of image_boisson
     *
     * @return  self
     */ 
    public function setImage_boisson($image_boisson)
    {
        $this->image_boisson = $image_boisson;

        return $this;
    }

    /**
     * Get the value of name_boisson
     */ 
    public function getName_boisson()
    {
        return $this->name_boisson;
    }

    /**
     * Set the value of name_boisson
     *
     * @return  self
     */ 
    public function setName_boisson($name_boisson)
    {
        $this->name_boisson = $name_boisson;

        return $this;
    }

    /**
     * Get the value of description_boisson
     */ 
    public function getDescription_boisson()
    {
        return $this->description_boisson;
    }

    /**
     * Set the value of description_boisson
     *
     * @return  self
     */ 
    public function setDescription_boisson($description_boisson)
    {
        $this->description_boisson = $description_boisson;

        return $this;
    }

    /**
     * Get the value of id_boisson
     */ 
    public function getId_boisson()
    {
        return $this->id_boisson;
    }

    /**
     * Set the value of id_boisson
     *
     * @return  self
     */ 
    public function setId_boisson($id_boisson)
    {
        $this->id_boisson = $id_boisson;

        return $this;
    }
}
