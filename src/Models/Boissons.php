<?php

namespace Hotel\Models;

class Boissons
{

    private $id_boisson;
    private $name_boisson;
    private $description_boisson;
    private $image_boisson;
    private $prix_un_boisson;
    private $quantite_client_boisson;
    private $date_client_boisson;


    public function getid_boisson()
    {
        return $this->id_boisson;
    }
    public function getname_boisson()
    {
        return $this->name_boisson;
    }
    public function getdescription_boisson()
    {
        return $this->description_boisson;
    }
    public function getimage_boisson()
    {
        return $this->image_boisson;
    }
    public function getprix_un_boisson()
    {
        return $this->prix_un_boisson;
    }
    public function getquantite_client_boisson()
    {
        return $this->quantite_client_boisson;
    }
    public function getdate_client_boisson()
    {
        return $this->date_client_boisson;
    }


    public function setid_boisson($id_boisson)
    {
        $this->id_boisson = $id_boisson;
    }
    public function setname_boisson($name_boisson)
    {
        $this->name_boisson = $name_boisson;
    }
    public function setdescription_boisson($description_boisson)
    {
        $this->description_boisson = $description_boisson;
    }
    public function setimage_boisson($image_boisson)
    {
        $this->image_boisson = $image_boisson;
    }
    public function setprix_un_boisson($prix_un_boisson)
    {
        $this->prix_un_boisson = $prix_un_boisson;
    }
    public function setquantite_client_boisson($quantite_client_boisson)
    {
        $this->quantite_client_boisson = $quantite_client_boisson;
    }
    public function setdate_client_boisson($date_client_boisson)
    {
        $this->date_client_boisson = $date_client_boisson;
    }
}
//controller set et get pour tous les bars