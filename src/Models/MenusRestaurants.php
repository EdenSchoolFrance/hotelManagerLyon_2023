<?php

namespace Hotel\Models;

class MenusRestaurants
{
    private $id_menu;
    private $name_menu;
    private $description_menu;
    private $image_menu;
    private $prix_menu;

    //RESTAURANTS
    private $id_restaurant;
    private $name_restaurant;


    public function getIdMenu()
    {
        return $this->id_menu;
    }

    public function setIdMenu($id_menu)
    {
        $this->id_menu = $id_menu;
    }

    public function getIdRestaurant()
    {
        return $this->id_restaurant;
    }

    public function setIdRestaurant($id_restaurant)
    {
        $this->id_restaurant = $id_restaurant;
    }

    public function getNameMenu()
    {
        return $this->name_menu;
    }

    public function setNameMenu($name_menu)
    {
        $this->name_menu = $name_menu;
    }

    public function getDescriptionMenu()
    {
        return $this->description_menu;
    }

    public function setDescriptionMenu($description_menu)
    {
        $this->description_menu = $description_menu;
    }

    public function getImageMenu()
    {
        return $this->image_menu;
    }

    public function setImageMenu($image_menu)
    {
        $this->image_menu = $image_menu;
    }

    public function getPrixMenu()
    {
        return $this->prix_menu;
    }

    public function setPrixMenu($prix_menu)
    {
        $this->prix_menu = $prix_menu;
    }

    //RESTAURANTS

    public function getNameRestaurant()
    {
        return $this->name_restaurant;
    }

    public function setNameRestaurant($name_restaurant)
    {
        return $this->name_restaurant = $name_restaurant;
    }
}
