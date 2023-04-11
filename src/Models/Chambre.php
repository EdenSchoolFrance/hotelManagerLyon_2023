<?php

namespace Hotel\Models;

/** Class Chambre **/
class Chambre
{

    private $id_chambre;
    private $name_chambre;
    private $description_chambre;
    private $image_chambre;
    private $option_chambre;
    private $prix_chambre;
    private $occupe_chambre;
    private $categorie_chambre;

    public function getId()
    {
        return $this->id_chambre;
    }

    public function getName()
    {
        return $this->name_chambre;
    }

    public function getDesc()
    {
        return $this->description_chambre;
    }

    public function getImg()
    {
        return $this->image_chambre;
    }

    public function getOption()
    {
        return $this->option_chambre;
    }

    public function getPrice()
    {
        return $this->prix_chambre;
    }

    public function getOccupe()
    {
        return $this->occupe_chambre;
    }

    public function getCategorie()
    {
        return $this->categorie_chambre;
    }


    public function setId(Int $id)
    {
        $this->id_chambre = $id;
    }

    public function setName(String $name)
    {
        $this->name_chambre = $name;
    }

    public function setDesc(String $desc)
    {
        $this->description_chambre = $desc;
    }

    public function setImg(String $img)
    {
        $this->image_chambre = $img;
    }

    public function setOption(String $option)
    {
        $this->option_chambre = $option;
    }

    public function setPrice(String $price)
    {
        $this->prix_chambre = $price;
    }

    public function setOccupe(String $occupe)
    {
        $this->occupe_chambre = $occupe;
    }

    public function setCategorie(String $categorie)
    {
        $this->categorie_chambre = $categorie;
    }
}
