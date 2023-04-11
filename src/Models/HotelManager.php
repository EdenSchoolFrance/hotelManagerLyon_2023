<?php

namespace Hotel\Models;

/** Class UserHotel **/
class HotelManager extends BDD
{

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
        $stmt = $this->bdd->prepare("INSERT INTO " . $_POST["test"] . "(nom_client, prenom_client, email_client) VALUES (?, ?, ?)");
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
        $stmt = $this->bdd->prepare('SELECT * FROM chambre WHERE occupe_chambre = true');
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
        if (!isset($_SESSION['count'])) {
            $_SESSION['count'] = 0;
        }

        $_SESSION["count"]++;

        if ($_POST["id_piscine"] != "undefined") {
            $stmt = $this->bdd->prepare('SELECT * FROM piscine WHERE id_piscine = ?');
            $stmt->execute(array($_POST["id_piscine"]));
            $test = $stmt->fetchAll()[0];
            if ($test["ouverture_piscine"] <= date("H:i:s", strtotime($_POST["debut_piscine"])) && $test["fermeture_piscine"] >= date("H:i:s", strtotime($_POST["fin_piscine"]))) {
                $stmt = $this->bdd->prepare('INSERT INTO client_piscine (id_piscine, id_client, date_debut_reservation_piscine, date_fin_reservation_piscine, num_reservation_piscine, status_piscine) VALUES (?, ?, ?, ?, ?, ?)');
                $stmt->execute(array($_POST["id_piscine"], $slug, date("Y-m-d", strtotime($_POST["debut_piscine"])), date("Y-m-d", strtotime($_POST["fin_piscine"])), $_SESSION["count"], ""));
            }
        }


        if ($_POST["id_salle"] != "undefined") {
            $stmt = $this->bdd->prepare('INSERT INTO client_salle (id_client, id_salle, date_debut_reservation_salle, date_fin_reservation_salle, num_reservation_salle, status_salle) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute(array($slug, $_POST["id_salle"], date("Y-m-d", strtotime($_POST["debut_salle"])), date("Y-m-d", strtotime($_POST["fin_salle"])), $_SESSION["count"], ""));
        }

        if ($_POST["id_chambre"] != "undefined") {
            $stmt = $this->bdd->prepare('INSERT INTO client_chambre (id_client, id_chambre, date_debut_reservation_chambre, date_fin_reservation_piscine_chambre, num_reservation_chambre, status_chambre) VALUES (?, ?, ?, ?, ?, ?)');
            $stmt->execute(array($slug, $_POST["id_chambre"], date("Y-m-d", strtotime($_POST["debut_chambre"])), date("Y-m-d", strtotime($_POST["fin_chambre"])), $_SESSION["count"], ""));
        }
    }
}
