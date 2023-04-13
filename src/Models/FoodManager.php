<?php

namespace Hotel\Models;

use Hotel\Models\Hotel;

/** Class FoodManager **/
class FoodManager
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getAllResto()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM restaurant');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Restaurant");
    }
    public function getAllBar()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM bar');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Bar");
    }

    public function getRestaurant($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM restaurant WHERE id_restaurant = ?");
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Restaurant");
        return $stmt->fetch();
    }
    public function getBar($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM bar WHERE id_bar = ?");
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Bar");
        return $stmt->fetch();
    }


    public function getMenuByRestaurant($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM menu WHERE id_restaurant = ?");
        $stmt->execute(array(
            $id
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Menu");
    }
    public function getBoissonsByBar($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM boisson JOIN bar_boisson ON boisson.id_boisson = bar_boisson.id_boisson WHERE id_bar = ?");
        $stmt->execute(array(
            $id
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Boisson");
    }

    public function getMenu($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM menu WHERE id_menu = ?");
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Menu");
        return $stmt->fetch();
    }
    public function getBoisson($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM boisson WHERE id_boisson = ?");
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Boisson");
        return $stmt->fetch();
    }


    public function validCommandMenu()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_menu(id_client, id_menu, quantite_client_menu, date_client_menu) VALUES (?, ?, ?, ?)");
        $stmt->execute(array(
            $_POST['client'],
            $_POST['idMenu'],
            $_POST['quantity'],
            date('Y-m-d'),
        ));
    }
    public function validCommandBoisson()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_boisson(id_client, id_boisson, quantite_client_boisson, date_client_boisson) VALUES (?, ?, ?, ?)");
        $stmt->execute(array(
            $_POST['client'],
            $_POST['idBoisson'],
            $_POST['quantity'],
            date('Y-m-d'),
        ));
    }

    //destock function for bar
    public function destock($boisson)
    {
        $stmt = $this->bdd->prepare("UPDATE bar_boisson SET quantite_stock_bar_boisson = quantite_stock_bar_boisson - ? WHERE id_boisson = ?");
        $stmt->execute(array(
            $_POST['quantity'],
            $boisson,
        ));
    }
}
