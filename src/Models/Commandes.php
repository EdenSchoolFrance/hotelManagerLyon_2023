<?php

namespace Phoenix\Models;

/** Class pour les commandes **/
class Commandes
{
    private $ID_COMMANDES;
    private $NCOMMANDE;
    private $ID_USER;
    private $ID;
    private $N_PARTICIPANT;
    private $N_SEMAINES;
    private $PRIX_TOTAL;

    public function getIdCommandes()
    {
        return $this->ID_COMMANDES;
    }
    public function getNCommande()
    {
        return $this->NCOMMANDE;
    }
    public function getIdUserCommandes()
    {
        return $this->ID_USER;
    }
    public function getId()
    {
        return $this->ID;
    }
    public function getPrixTotal()
    {
        return $this->PRIX_TOTAL;
    }
    public function getNParticipant()
    {
        return $this->N_PARTICIPANT;
    }
    public function getNSemaines()
    {
        return $this->N_SEMAINES;
    }
    public function setIdCommandes(string $ID_COMMANDES)
    {
        $this->ID_COMMANDES = $ID_COMMANDES;
    }
    public function setNCommande(string $NCOMMANDE)
    {
        $this->NCOMMANDE = $NCOMMANDE;
    }
    public function setIdUserCommandes(string $ID_USER)
    {
        $this->ID_USER = $ID_USER;
    }
    public function setId(string $ID)
    {
        $this->ID = $ID;
    }
    public function setPrixTotal(string $PRIX_TOTAL)
    {
        $this->PRIX_TOTAL = $PRIX_TOTAL;
    }
    public function setNParticipant(string $N_PARTICIPANT)
    {
        $this->N_PARTICIPANT = $N_PARTICIPANT;
    }
    public function setNSemaines(string $N_SEMAINES)
    {
        $this->N_SEMAINES = $N_SEMAINES;
    }
}
