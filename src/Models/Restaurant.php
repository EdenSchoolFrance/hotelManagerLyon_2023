<?php

namespace Hotel\Models;

/** Class Restaurant **/
class Restaurant
{

    private $id_restaurant;
    private $name_restaurant;

    public function getId()
    {
        return $this->id_restaurant;
    }

    public function getName()
    {
        return $this->name_restaurant;
    }

    public function setId(Int $id)
    {
        $this->id_restaurant = $id;
    }

    public function setName(String $name)
    {
        $this->name_restaurant = $name;
    }
}
