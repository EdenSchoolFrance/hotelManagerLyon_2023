<?php

namespace Hotel\Models;

/** Class Boisson **/
class Boisson
{
    private $id_boisson;
    private $name_boisson;
    private $description_boisson;
    private $image_boisson;
    private $prix_un_boisson;
    private $quantite_stock_bar_boisson;

    //GET
    public function getId()
    {
        return $this->id_boisson;
    }
    public function getName()
    {
        return $this->name_boisson;
    }
    public function getDesc()
    {
        return $this->description_boisson;
    }
    public function getImg()
    {
        return $this->image_boisson;
    }
    public function getPrice()
    {
        return $this->prix_un_boisson;
    }
    public function getStock()
    {
        return $this->quantite_stock_bar_boisson;
    }

    //SET
    public function setId(Int $id)
    {
        $this->id_boisson = $id;
    }
    public function setName(String $name)
    {
        $this->name_boisson = $name;
    }
    public function setDesc(String $desc)
    {
        $this->description_boisson = $desc;
    }
    public function setImg(String $img)
    {
        $this->image_boisson = $img;
    }
    public function setPrice(String $price)
    {
        $this->prix_un_boisson = $price;
    }
    public function setStock(String $stock)
    {
        $this->quantite_stock_bar_boisson = $stock;
    }
}
