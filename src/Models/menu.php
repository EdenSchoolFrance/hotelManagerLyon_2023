<?php
namespace hotel\Models;

/** Class Menu **/
class Menu {

    private $id_menu;
    private $name_menu;
    private $description_menu;
    private $options_chambre;
    private $prix_menu;
    private $quantite_client_menu;


    public function getId_menu()
    {
        return $this->id_menu;
    }

    public function getName_menu()
    {
        return $this->name_menu;
    }

    public function getDescription_menu()
    {
        return $this->description_menu;
    }

    public function getOptions_chambre()
    {
        return $this->options_chambre;
    }

    public function getPrix_menu()
    {
        return $this->prix_menu;
    }

    

    public function setId_menu($id_menu)
    {
        $this->id_menu = $id_menu;

        return $this;
    }

    public function setName_menu($name_menu)
    {
        $this->name_menu = $name_menu;

        return $this;
    }

    public function setDescription_menu($description_menu)
    {
        $this->description_menu = $description_menu;

        return $this;
    }

    public function setOptions_chambre($options_chambre)
    {
        $this->options_chambre = $options_chambre;

        return $this;
    }

    public function setPrix_menu($prix_menu)
    {
        $this->prix_menu = $prix_menu;

        return $this;
    }


    public function getQuantite_client_menu()
    {
        return $this->quantite_client_menu;
    }

    public function setQuantite_client_menu($quantite_client_menu)
    {
        $this->quantite_client_menu = $quantite_client_menu;

        return $this;
    }
}