<?php

namespace Hotel\Models;

use Hotel\Models\Chambres;
use Hotel\Models\Piscines;
use Hotel\Models\Salles;
use Hotel\Models\Restaurants;
use Hotel\Models\Bars;


/** Class UserManager **/
class HotelManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function show_chambre()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM chambre');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Chambres");
    }

    public function show_piscines()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM piscine');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Piscines");
    }

    public function show_salles()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM salle');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Salles");
    }

    public function show_restaurants()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM restaurant');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Restaurants");
    }

    public function show_bars()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM bar');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Bars");
    }
}
