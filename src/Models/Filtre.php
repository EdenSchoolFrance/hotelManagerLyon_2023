<?php

namespace Phoenix\Models;

class Filtre
{

    private $ID_FILTRE;
    private $NOM_FILTRE;

    public function getIdFiltre()
    {
        return $this->IDFILTRE;
    }
    public function getNomFiltre()
    {
        return $this->NOM_FILTRE;
    }
    public function setIdFiltre(string $ID_FILTRE)
    {
        $this->ID_FILTRE = $ID_FILTRE;
    }
    public function setNomFiltre(string $NOM_FILTRE)
    {
        $this->NOM_FILTRE = $NOM_FILTRE;
    }
}
//controller set et get pour toute la class filtre