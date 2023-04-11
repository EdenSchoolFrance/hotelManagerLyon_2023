<?php

namespace Hotel\Models;

class Hotel
{
    private $ID;
    private $NOM;
    private $PRIX;
    private $DESCRIPTION;
    private $FORMAT_IMG;

    public function getIdDestination()
    {
        return $this->ID;
    }
    public function getNomDestination()
    {
        return $this->NOM;
    }
    public function getPrixDestination()
    {
        return $this->PRIX;
    }
    public function getDescDestination()
    {
        return $this->DESCRIPTION;
    }
    public function getFormatImgDestination()
    {
        return $this->FORMAT_IMG;
    }


    public function setIdDestination(string $IDDESTINATION)
    {
        $this->ID = $IDDESTINATION;
    }
    public function setNomDestination(string $NOMDESTINATION)
    {
        $this->NOM = $NOMDESTINATION;
    }
    public function setPrixDestination(string $PRIXDESTINATION)
    {
        $this->PRIX = $PRIXDESTINATION;
    }
    public function setDescDestination(int $DESCDESTINATION)
    {
        $this->DESCRIPTION = $DESCDESTINATION;
    }
    public function setFormatImgDestination(string $FORMATIMGDESTINATION)
    {
        $this->FORMAT_IMG = $FORMATIMGDESTINATION;
    }
}
//controller set et get pour toute la class voyage