<?php

namespace Hotel\Models;

/** Class pour les piscines **/
class Restaurants
{
    private $id_restaurant;
    private $name_restaurant;


    public function getid_restaurant()
    {
        return $this->id_restaurant;
    }
    public function getname_restaurant()
    {
        return $this->name_restaurant;
    }


    public function setid_restaurant($id_restaurant)
    {
        $this->id_restaurant = $id_restaurant;
    }
    public function setname_restaurant($name_restaurant)
    {
        $this->name_restaurant = $name_restaurant;
    }
}
//controller set et get pour toute la class client