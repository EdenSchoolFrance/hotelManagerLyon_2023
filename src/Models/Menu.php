<?php

namespace Hotel\Models;

/** Class Menu **/
class Menu
{
    private $id_menu;
    private $name_menu;
    private $description_menu;
    private $image_menu;
    private $prix_un_menu;

    //GET
    public function getId()
    {
        return $this->id_menu;
    }
    public function getName()
    {
        return $this->name_menu;
    }
    public function getDesc()
    {
        return $this->description_menu;
    }
    public function getImg()
    {
        return $this->image_menu;
    }
    public function getPrice()
    {
        return $this->prix_un_menu;
    }

    //SET
    public function setId(Int $id)
    {
        $this->id_menu = $id;
    }
    public function setName(String $name)
    {
        $this->name_menu = $name;
    }
    public function setDesc(String $desc)
    {
        $this->description_menu = $desc;
    }
    public function setImg(String $img)
    {
        $this->image_menu = $img;
    }
    public function setPrice(String $price)
    {
        $this->prix_un_menu = $price;
    }
}
