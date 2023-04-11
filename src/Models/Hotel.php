<?php

namespace Hotel\Models;

/** Class Hotel **/
class Hotel
{

    // Methodes

    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $email_client;

    private $name_boisson;
    private $description_boisson;
    private $image_boisson;
    private $prix_un_boisson;

    private $name_bar;
    private $quantite_stock_bar_boisson;

    private $name_chambre;
    private $description_chambre;
    private $image_chambre;
    private $option_chambre;
    private $prix_chambre;
    private $occupe_chambre;
    private $categorie_chambre;
    private $id_chambre;

    // Accesseurs

    // Id_client
    public function getIdClient()
    {
        return $this->id_client;
    }

    public function setIdClient(String $id_client)
    {
        $this->id_client = $id_client;
    }

    // Nom Client
    public function getNomClient()
    {
        return $this->nom_client;
    }

    public function setNomClient(String $nom_client)
    {
        $this->nom_client = $nom_client;
    }

    // Prenom Client
    public function getPrenomClient()
    {
        return $this->prenom_client;
    }

    public function setPrenomClient(String $prenom_client)
    {
        $this->prenom_client = $prenom_client;
    }

    // Email Client
    public function getMailClient()
    {
        return $this->email_client;
    }

    public function setMailClient(String $email_client)
    {
        $this->email_client = $email_client;
    }


    ///// BOISSONS /////

    // Nom boisson
    public function getNomBoisson()
    {
        return $this->name_boisson;
    }

    public function setNomBoisson(String $name_boisson)
    {
        $this->name_boisson = $name_boisson;
    }

    // Description Boisson
    public function getDescriptionBoisson()
    {
        return $this->description_boisson;
    }

    public function setDescriptionBoisson(String $description_boisson)
    {
        $this->description_boisson = $description_boisson;
    }

    // Image Boisson
    public function getImageBoisson()
    {
        return $this->image_boisson;
    }

    public function setImageBoisson(String $image_boisson)
    {
        $this->image_boisson = $image_boisson;
    }

    // Prix Boisson
    public function getPrixBoisson()
    {
        return $this->prix_un_boisson;
    }

    public function setPrixBoisson(String $prix_un_boisson)
    {
        $this->prix_un_boisson = $prix_un_boisson;
    }


    // Nom Bar
    public function getNomBar()
    {
        return $this->name_bar;
    }

    public function setNomBar(String $name_bar)
    {
        $this->name_bar = $name_bar;
    }

    // Stock par boisson et par bar
    public function getQuantiteBoisson()
    {
        return $this->quantite_stock_bar_boisson;
    }

    public function setQuantiteBoisson(String $quantite_stock_bar_boisson)
    {
        $this->quantite_stock_bar_boisson = $quantite_stock_bar_boisson;
    }



    ///// CHAMBRE /////


    // Id de la chambre
    public function getIdChambre()
    {
        return $this->id_chambre;
    }

    public function setIdChambre(String $id_chambre)
    {
        $this->id_chambre = $id_chambre;
    }

    // Nom de la chambre
    public function getNameChambre()
    {
        return $this->name_chambre;
    }

    public function setNameChambre(String $name_chambre)
    {
        $this->name_chambre = $name_chambre;
    }

    // Description de la chambre
    public function getDescriptionChambre()
    {
        return $this->description_chambre;
    }

    public function setDescriptionChambre(String $description_chambre)
    {
        $this->description_chambre = $description_chambre;
    }

    // Image de la chambre
    public function getImageChambre()
    {
        return $this->image_chambre;
    }

    public function setImageChambre(String $image_chambre)
    {
        $this->image_chambre = $image_chambre;
    }


    // Options de la chambre
    public function getOptionsChambre()
    {
        return $this->option_chambre;
    }

    public function setOptionsChambre(String $option_chambre)
    {
        $this->option_chambre = $option_chambre;
    }

    // Prix de la chambre
    public function getPrixChambre()
    {
        return $this->prix_chambre;
    }

    public function setPrixChambre(String $prix_chambre)
    {
        $this->prix_chambre = $prix_chambre;
    }

    // Occupation de la chambre
    public function getOccupeChambre()
    {
        return $this->occupe_chambre;
    }

    public function setOccupeChambre(String $occupe_chambre)
    {
        $this->occupe_chambre = $occupe_chambre;
    }

    // Categorie de la chambre
    public function getCategorieChambre()
    {
        return $this->categorie_chambre;
    }

    public function setCategorieChambre(String $categorie_chambre)
    {
        $this->categorie_chambre = $categorie_chambre;
    }
}
