<?php

namespace Hotel\Models;

use Hotel\Models\Plat;

/** Class UserManager **/
class HotelManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getAllPlats()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM produit JOIN type ON produit.idtype = type.idtype JOIN origine ON produit.idorigine = origine.idorigine JOIN categorie ON produit.idcategorie = categorie.idcategorie');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Plats\Models\Plat");
    }

    public function getFiltredPlats($filter, $filterArray)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM produit JOIN type ON produit.idtype = type.idtype JOIN origine ON produit.idorigine = origine.idorigine JOIN categorie ON produit.idcategorie = categorie.idcategorie ' . $filter);
        $stmt->execute($filterArray);
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Plats\Models\Plat");
    }

    public function getAllIngredients()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM ingredients');
        $stmt->execute();
        return $stmt;
    }

    public function getIngredients($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM ingredients JOIN contenir ON ingredients.IDINGREDIENT = contenir.IDINGREDIENT WHERE contenir.IDPRODUIT = ?');
        $stmt->execute(array(
            $id,
        ));
        return $stmt;
    }

    public function getAllOrigines()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM origine');
        $stmt->execute();
        return $stmt;
    }


    public function addToCart()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM panier WHERE IDUSER = ? AND IDPRODUIT = ?');
        $stmt->execute(array(
            $_SESSION["user"]["id"],
            $_POST['product'],
        ));
        //verifie si l'article est déja dans le panier ou pas
        if ($stmt->rowCount() > 0) {
            $quantity = $stmt->fetch()['QUANTITY'];
            $stmt2 = $this->bdd->prepare('UPDATE panier SET QUANTITY = ? WHERE IDUSER = ? AND IDPRODUIT = ?');
            $stmt2->execute(array(
                $_POST['quantity'] + $quantity,
                $_SESSION["user"]["id"],
                $_POST['product'],
            ));
        } else {
            $stmt2 = $this->bdd->prepare("INSERT INTO panier(IDUSER, IDPRODUIT, QUANTITY) VALUES (?, ?, ?)");
            $stmt2->execute(array(
                $_SESSION["user"]["id"],
                $_POST['product'],
                $_POST['quantity'],
            ));
        }
    }

    public function deleteToCart($product)
    {
        $stmt = $this->bdd->prepare("DELETE FROM panier WHERE IDUSER = ? AND IDPRODUIT = ?");
        $stmt->execute(array(
            $_SESSION["user"]["id"],
            $product,
        ));
    }

    public function getCart()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM panier JOIN produit ON panier.idproduit = produit.idproduit JOIN type ON produit.idtype = type.idtype JOIN origine ON produit.idorigine = origine.idorigine JOIN categorie ON produit.idcategorie = categorie.idcategorie WHERE panier.iduser = ?');
        $stmt->execute(array($_SESSION['user']['id']));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Plats\Models\Plat");
    }

    public function getCartSize()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM panier JOIN produit ON panier.idproduit = produit.idproduit JOIN type ON produit.idtype = type.idtype JOIN origine ON produit.idorigine = origine.idorigine JOIN categorie ON produit.idcategorie = categorie.idcategorie WHERE panier.iduser = ?');
        $stmt->execute(array($_SESSION['user']['id']));
        $size = 0;
        while ($ligne = $stmt->fetch()) {
            $size++;
        }
        return $size;
    }

    public function updateCart($id)
    {
        $stmt = $this->bdd->prepare('UPDATE panier SET QUANTITY = ? WHERE IDUSER = ? AND IDPRODUIT = ?');
        $stmt->execute(array(
            $_POST[$id . '_quantity'],
            $_SESSION['user']['id'],
            $id,
        ));
    }

    public function command($commande, $product, $quantity)
    {
        $stmt = $this->bdd->prepare("INSERT INTO commander(IDPRODUIT, IDUSER, QUANTITE, IDCOMMANDE, DATE) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array(
            $product,
            $_SESSION["user"]["id"],
            $quantity,
            $commande,
            date('Y-m-d H:i:s'),
        ));
    }

    public function getCommandes()
    {
        if ($_SESSION['user']['permissions'] == 1) {
            $stmt = $this->bdd->prepare('SELECT * FROM commander JOIN users ON commander.IDUSER = users.id');
            $stmt->execute();
        } else {
            $stmt = $this->bdd->prepare('SELECT * FROM commander WHERE IDUSER = ? ORDER BY date DESC');
            $stmt->execute(array($_SESSION['user']['id']));
        }
        return $stmt;
    }

    public function getCommande($id)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM commander JOIN produit ON commander.IDPRODUIT = produit.IDPRODUIT WHERE IDUSER = ? AND IDCOMMANDE = ?');
        $stmt->execute(array(
            $_SESSION['user']['id'],
            $id,
        ));
        return $stmt;
    }
}
