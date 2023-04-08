<?php

namespace Hotel\Models;

class Restaurant
{
    private $id_restaurant;
    private $name_restaurant;




    /**
     * Get the value of name_restaurant
     */
    public function getName_restaurant()
    {
        return $this->name_restaurant;
    }

    /**
     * Set the value of name_restaurant
     *
     * @return  self
     */
    public function setName_restaurant($name_restaurant)
    {
        $this->name_restaurant = $name_restaurant;

        return $this;
    }

    /**
     * Get the value of id_restaurant
     */
    public function getId_restaurant()
    {
        return $this->id_restaurant;
    }

    /**
     * Set the value of id_restaurant
     *
     * @return  self
     */
    public function setId_restaurant($id_restaurant)
    {
        $this->id_restaurant = $id_restaurant;

        return $this;
    }
}
