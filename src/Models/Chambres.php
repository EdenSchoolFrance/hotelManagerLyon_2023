<?php

namespace Hotel\Models;

class Chambres
{
    private $id_chambre;
    private $description_chambre;
    private $image_chambre;
    private $options_chambre;
    private $prix_chambre;
    private $occupe_chambre;
    private $categorie_chambre;

    public function getid_chambre()
    {
        return $this->id_chambre;
    }
    public function getdescription_chambre()
    {
        return $this->description_chambre;
    }
    public function getimage_chambre()
    {
        return $this->image_chambre;
    }
    public function getoptions_chambre()
    {
        return $this->options_chambre;
    }
    public function getprix_chambre()
    {
        return $this->prix_chambre;
    }
    public function getoccupe_chambre()
    {
        return $this->occupe_chambre;
    }
    public function getcategorie_chambre()
    {
        return $this->categorie_chambre;
    }


    public function setid_chambre($id_chambre)
    {
        $this->id_chambre = $id_chambre;
    }
    public function setdescription_chambre($description_chambre)
    {
        $this->description_chambre = $description_chambre;
    }
    public function setimage_chambre($image_chambre)
    {
        $this->image_chambre = $image_chambre;
    }
    public function setoptions_chambre($options_chambre)
    {
        $this->options_chambre = $options_chambre;
    }
    public function setprix_chambre($prix_chambre)
    {
        $this->prix_chambre = $prix_chambre;
    }
    public function setoccupe_chambre($occupe_chambre)
    {
        $this->occupe_chambre = $occupe_chambre;
    }
    public function setcategorie_chambre($categorie_chambre)
    {
        $this->categorie_chambre = $categorie_chambre;
    }
}
//controller set et get pour toute la class client