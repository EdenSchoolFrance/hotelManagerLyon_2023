<?php

namespace Hotel\Models;

class Chambre
{
    private $id_chambre;
    private $description_chambre;
    private $name_chambre;
    private $image_chambre;



    /**
     * Get the value of image_chambre
     */
    public function getImage_chambre()
    {
        return $this->image_chambre;
    }

    /**
     * Set the value of image_chambre
     *
     * @return  self
     */
    public function setImage_chambre($image_chambre)
    {
        $this->image_chambre = $image_chambre;

        return $this;
    }

    /**
     * Get the value of name_chambre
     */
    public function getName_chambre()
    {
        return $this->name_chambre;
    }

    /**
     * Set the value of name_chambre
     *
     * @return  self
     */
    public function setName_chambre($name_chambre)
    {
        $this->name_chambre = $name_chambre;

        return $this;
    }

    /**
     * Get the value of description_chambre
     */
    public function getDescription_chambre()
    {
        return $this->description_chambre;
    }

    /**
     * Set the value of description_chambre
     *
     * @return  self
     */
    public function setDescription_chambre($description_chambre)
    {
        $this->description_chambre = $description_chambre;

        return $this;
    }

    /**
     * Get the value of id_chambre
     */
    public function getId_chambre()
    {
        return $this->id_chambre;
    }

    /**
     * Set the value of id_chambre
     *
     * @return  self
     */
    public function setId_chambre($id_chambre)
    {
        $this->id_chambre = $id_chambre;

        return $this;
    }
}
