<?php
namespace hotel\Models;

/** Class Boisson **/
class Boisson {

    private $id_boisson;
    private $name_boisson;
    private $description_boisson;
    private $options_chambre;
    private $prix_boisson;
    private $quantite_client_boisson;


    public function getId_boisson()
    {
        return $this->id_boisson;
    }

    public function getName_boisson()
    {
        return $this->name_boisson;
    }

    public function getDescription_boisson()
    {
        return $this->description_boisson;
    }

    public function getOptions_chambre()
    {
        return $this->options_chambre;
    }

    public function getPrix_boisson()
    {
        return $this->prix_boisson;
    }

    

    public function setId_boisson($id_boisson)
    {
        $this->id_boisson = $id_boisson;

        return $this;
    }

    public function setName_boisson($name_boisson)
    {
        $this->name_boisson = $name_boisson;

        return $this;
    }

    public function setDescription_boisson($description_boisson)
    {
        $this->description_boisson = $description_boisson;

        return $this;
    }

    public function setOptions_chambre($options_chambre)
    {
        $this->options_chambre = $options_chambre;

        return $this;
    }

    public function setPrix_boisson($prix_boisson)
    {
        $this->prix_boisson = $prix_boisson;

        return $this;
    }

    public function getQuantite_client_boisson()
    {
        return $this->quantite_client_boisson;
    }

    public function setQuantite_client_boisson($quantite_client_boisson)
    {
        $this->quantite_client_boisson = $quantite_client_boisson;

        return $this;
    }
}