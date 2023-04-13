<?php

namespace Hotel\Models;

/** Class pour les menus **/
class Menus
{

    private $id_menu;
    private $id_restaurant;
    private $name_menu;
    private $description_menu;
    private $image_menu;
    private $prix_un_menu;
    private $quantite_client_menu;


    public function getid_menu()
    {
        return $this->id_menu;
    }
    public function getid_restaurant()
    {
        return $this->id_restaurant;
    }
    public function getname_menu()
    {
        return $this->name_menu;
    }
    public function getdescription_menu()
    {
        return $this->description_menu;
    }
    public function getimage_menu()
    {
        return $this->image_menu;
    }
    public function getprix_un_menu()
    {
        return $this->prix_un_menu;
    }
    public function getquantite_client_menu()
    {
        return $this->quantite_client_menu;
    }


    public function setid_menu($id_menu)
    {
        $this->id_menu = $id_menu;
    }
    public function setid_restaurant($id_restaurant)
    {
        $this->id_restaurant = $id_restaurant;
    }
    public function setname_menu($name_menu)
    {
        $this->name_menu = $name_menu;
    }
    public function setdescription_menu($description_menu)
    {
        $this->description_menu = $description_menu;
    }
    public function setimage_menu($image_menu)
    {
        $this->image_menu = $image_menu;
    }
    public function setprix_un_menu($prix_un_menu)
    {
        $this->prix_un_menu = $prix_un_menu;
    }
    public function setquantite_client_menu($quantite_client_menu)
    {
        $this->quantite_client_menu = $quantite_client_menu;
    }
}
//controller set et get pour tous les bars