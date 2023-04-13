<?php

namespace Hotel\Models;

use Hotel\Models\Bdd;



/** Class UserManager **/
class HotelManager extends Bdd
{

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

    public function show_menus($slug)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM menu WHERE id_restaurant = ?');
        $stmt->execute(array(
            $slug,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Menus");
    }
}
