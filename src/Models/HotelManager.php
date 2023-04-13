<?php

namespace Hotel\Models;

use PDO;

/** Class UserHotel **/
class HotelManager extends BDD
{

    protected $bdd;

    public function find($email)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE email_client = ?");
        $stmt->execute(array(
            $email
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");

        return $stmt->fetch();
    }

    public function addClient()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client (nom_client, prenom_client, email_client) VALUES (?, ?, ?)");
        $stmt->execute(array(
            htmlentities($_POST["firstName"]),
            htmlentities($_POST["lastName"]),
            htmlentities($_POST["email"]),
        ));
    }

    public function updateClient($slug)
    {
        $stmt = $this->bdd->prepare("UPDATE client SET nom_client = ?, prenom_client = ?, email_client = ? WHERE id_client = ?");
        $stmt->execute(array(htmlentities($_POST["lastName"]), htmlentities($_POST["firstName"]), htmlentities($_POST["email"]), $slug));
    }

    public function removeClient($slug)
    {

        $stmt = $this->bdd->prepare("DELETE FROM client_boisson WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));

        $stmt = $this->bdd->prepare("UPDATE chambre JOIN client_chambre ON chambre.id_chambre = client_chambre.id_chambre SET occupe_chambre = ? WHERE id_client = ?");
        $stmt->execute(array(
            "0",
            $slug
        ));

        $stmt = $this->bdd->prepare("DELETE FROM client_chambre WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));

        $stmt = $this->bdd->prepare("DELETE FROM client_salle WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));

        $stmt = $this->bdd->prepare("DELETE FROM client_piscine WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));

        $stmt = $this->bdd->prepare("DELETE FROM client_menu WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));


        $stmt = $this->bdd->prepare("DELETE FROM client WHERE id_client = ?");
        $stmt->execute(array(
            $slug
        ));
    }

    public function show()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    public function showSpecifiqueClient($slug)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client WHERE id_client = ?');
        $stmt->execute(array($slug));

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    public function showChambre()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM chambre WHERE occupe_chambre = false');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Chambre");
    }

    public function showChambreSpecifique()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM chambre WHERE id_chambre = ?');
        $stmt->execute(array($_POST["id_chambre"] ?? ""));

        return $stmt->fetch();
    }

    public function showRestoSpecifique()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM restaurant WHERE id_restaurant = ?');
        $stmt->execute(array($_POST["id_resto"] ?? ""));

        return $stmt->fetch();
    }

    public function showResto()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM restaurant');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function showPiscine()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM piscine');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Piscine");
    }

    public function showSalle()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM salle');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Salle");
    }

    public function reservation($slug)
    {
        $stmt = $this->bdd->prepare('SELECT MAX(num_reservation_chambre) FROM client_chambre');
        $stmt->execute(array());
        if (!isset($_SESSION['count'])) {
            $_SESSION['count'] = $stmt->fetch()[0] ?? 0;
        }

        $_SESSION["count"]++;

        if (isset($_POST["id_piscine"])) {
            $stmt = $this->bdd->prepare('SELECT * FROM piscine WHERE id_piscine = ?');
            $stmt->execute(array($_POST["id_piscine"]));
            $test = $stmt->fetchAll()[0];
            if ($test["ouverture_piscine"] <= date("H:i:s", strtotime($_POST["debut_piscine"])) && $test["fermeture_piscine"] >= date("H:i:s", strtotime($_POST["fin_piscine"]))) {
                $stmt = $this->bdd->prepare('INSERT INTO client_piscine (id_piscine, id_client, date_debut_reservation_piscine, date_fin_reservation_piscine, num_reservation_piscine, status_piscine) VALUES (?, ?, ?, ?, ?, ?)');
                $stmt->execute(array($_POST["id_piscine"], $slug, date("Y-m-d", strtotime($_POST["debut_piscine"])), date("Y-m-d", strtotime($_POST["fin_piscine"])), $_SESSION["count"], ""));
            } else {
                $_POST["error"] = "error";
            }
        }

        if (isset($_POST["id_salle"])) {
            $stmt = $this->bdd->prepare('INSERT INTO client_salle (id_client, id_salle, date_debut_reservation_salle, date_fin_reservation_salle, num_reservation_salle, status_salle) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute(array($slug, $_POST["id_salle"], date("Y-m-d", strtotime($_POST["debut_salle"])), date("Y-m-d", strtotime($_POST["fin_salle"])), $_SESSION["count"], ""));
        }

        if (isset($_POST["id_chambre"])) {
            $stmt = $this->bdd->prepare('INSERT INTO client_chambre (id_client, id_chambre, date_debut_reservation_chambre, date_fin_reservation_piscine_chambre, num_reservation_chambre, status_chambre) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute(array($slug, $_POST["id_chambre"], date("Y-m-d", strtotime($_POST["debut_chambre"])), date("Y-m-d", strtotime($_POST["fin_chambre"])), $_SESSION["count"], ""));

            $stmt = $this->bdd->prepare('UPDATE chambre SET occupe_chambre = 1 WHERE id_chambre = ?');
            $stmt->execute(array($_POST["id_chambre"]));
        }

        $stmt = $this->bdd->prepare('SELECT * FROM bar_boisson');
        $stmt->execute();
        if (isset($_POST["id_boisson"])) {
            $stock = $stmt->fetchAll()[0]["quantite_stock_bar_boisson"];
            if ($stock >= $_POST["quantity_boisson"]) {
                $stmt = $this->bdd->prepare('UPDATE bar_boisson SET quantite_stock_bar_boisson = ?');
                $stmt->execute(array($stock - $_POST["quantity_boisson"]));

                $stmt = $this->bdd->prepare('INSERT INTO client_boisson (id_client, id_boisson, quantite_client_boisson, date_client_boisson) VALUES (?, ?, ?, ?)');
                $stmt->execute(array($slug, $_POST["id_boisson"], $_POST["quantity_boisson"], $_POST["debut_boisson"]));
            } else {
                echo "stock";
            }
        }
    }

    public function showMenu()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM menu");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Menu");
    }

    public function addMenu()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_menu (id_client, id_menu, quantite_client_menu) VALUES (?, ?, ?)");
        $stmt->execute(array($_POST["client_id"], $_POST["id_menu"], $_POST["quantity_menu"]));
    }

    public function showBoisson($slug)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM boisson JOIN bar_boisson ON boisson.id_boisson = bar_boisson.id_boisson WHERE bar_boisson.id_boisson = ?");
        $stmt->execute(array($slug));

        return $stmt->fetchAll(PDO::FETCH_CLASS, "Hotel\Models\Boisson");
    }

    public function showBar()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM bar JOIN bar_boisson ON bar.id_bar = bar_boisson.id_bar");
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
