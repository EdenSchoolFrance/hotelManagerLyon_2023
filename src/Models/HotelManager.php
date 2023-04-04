<?php

namespace Hotel\Models;

use Hotel\Models\Hotel;

/** Class UserManager **/
class HotelManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function getAll()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM destination');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Phoenix\Models\Voyage");
    }
    public function getAllLimit()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM destination Limit 6');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Phoenix\Models\Voyage");
    }
    public function getAllFiltred($slug)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM destination LEFT JOIN contient ON contient.ID = destination.ID LEFT JOIN filtre ON filtre.ID_FILTRE = contient.ID_FILTRE WHERE filtre.NOM_FILTRE = ?');
        $stmt->execute(array(
            $slug,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Phoenix\Models\Voyage");
    }
    public function getVoyage($slug)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM destination WHERE ID = ?');
        $stmt->execute(array(
            $slug,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Phoenix\Models\Voyage");

        return $stmt->fetch();
    }
}
