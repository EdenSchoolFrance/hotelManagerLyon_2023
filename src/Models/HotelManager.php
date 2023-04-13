<?php

namespace Hotel\Models;

use PDO;

/** Class UserHotel **/
class HotelManager extends BDD
{

    protected $bdd;

    //function that allows to recover all the clients and to check if the email exists or not

    public function find($email)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE email_client = ?");
        $stmt->execute(array(
            $email
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");

        return $stmt->fetch();
    }

    //function for add Client

    public function addClient()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client (nom_client, prenom_client, email_client) VALUES (?, ?, ?)");
        $stmt->execute(array(
            htmlentities($_POST["firstName"]),
            htmlentities($_POST["lastName"]),
            htmlentities($_POST["email"]),
        ));
    }

    //function for update Client

    public function updateClient($slug)
    {
        $stmt = $this->bdd->prepare("UPDATE client SET nom_client = ?, prenom_client = ?, email_client = ? WHERE id_client = ?");
        $stmt->execute(array(htmlentities($_POST["lastName"]), htmlentities($_POST["firstName"]), htmlentities($_POST["email"]), $slug));
    }

    //function for remove Client and all reservation who has reservation

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

    //show All client

    public function show()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    //get all client in relation to its id

    public function showSpecifiqueClient($slug)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client WHERE id_client = ?');
        $stmt->execute(array($slug));

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }

    //show all chambre which is occupied

    public function showChambre()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM chambre WHERE occupe_chambre = false');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Chambre");
    }

    //shows all chambre in relation to its id

    public function showChambreSpecifique()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM chambre WHERE id_chambre = ?');
        $stmt->execute(array($_POST["id_chambre"] ?? ""));

        return $stmt->fetch();
    }

    //shows all restaurant in relation to its id

    public function showRestoSpecifique()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM restaurant WHERE id_restaurant = ?');
        $stmt->execute(array($_POST["id_resto"] ?? ""));

        return $stmt->fetch();
    }

    //shows all restaurant

    public function showResto()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM restaurant');
        $stmt->execute();

        return $stmt->fetchAll();
    }

    //shows all swimming pool

    public function showPiscine()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM piscine');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Piscine");
    }

    //shows all salle

    public function showSalle()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM salle');
        $stmt->execute();

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Salle");
    }

    //add reservation of option taken

    public function reservation($slug)
    {
        $stmt = $this->bdd->prepare('SELECT MAX(num_reservation_chambre) FROM client_chambre');
        $stmt->execute(array());
        if (!isset($_SESSION['count'])) {
            $_SESSION['count'] = $stmt->fetch()[0] ?? 0;
        }

        $_SESSION["count"]++;
        $bool = false;

        foreach (array_keys($_POST) as $name) {
            if (empty($_POST[$name])) {
                $bool = true;
            }
        }

        if ($bool == false) {
            if (isset($_POST["id_piscine"])) {
                $stmt = $this->bdd->prepare('SELECT * FROM piscine WHERE id_piscine = ?');
                $stmt->execute(array($_POST["id_piscine"]));
                $getInfo = $stmt->fetchAll()[0];
                if ($getInfo["ouverture_piscine"] <= date("H:i:s", strtotime($_POST["debut_piscine"])) && $getInfo["fermeture_piscine"] >= date("H:i:s", strtotime($_POST["fin_piscine"]))) {
                    $stmt = $this->bdd->prepare('INSERT INTO client_piscine (id_piscine, id_client, date_debut_reservation_piscine, date_fin_reservation_piscine, num_reservation_piscine, status_piscine) VALUES (?, ?, ?, ?, ?, ?)');
                    $stmt->execute(array($_POST["id_piscine"], $slug, date("Y-m-d", strtotime($_POST["debut_piscine"])), date("Y-m-d", strtotime($_POST["fin_piscine"])), $_SESSION["count"], ""));
                }
            }

            if (isset($_POST["id_salle"])) {
                $stmt = $this->bdd->prepare('INSERT INTO client_salle (id_client, id_salle, date_debut_reservation_salle, date_fin_reservation_salle, num_reservation_salle, status_salle) VALUES (?, ?, ?, ?, ?, ?)');
                $stmt->execute(array($slug, $_POST["id_salle"], date("Y-m-d", strtotime($_POST["debut_salle"])), date("Y-m-d", strtotime($_POST["fin_salle"])), $_SESSION["count"], ""));
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
            if (isset($_POST["id_boisson"]) && !empty($_POST["quantity_boisson"])) {
                $stock = $stmt->fetchAll()[0]["quantite_stock_bar_boisson"];
                if ($stock >= ($_POST["quantity_boisson"] ?? 1)) {
                    $stmt = $this->bdd->prepare('UPDATE bar_boisson SET quantite_stock_bar_boisson = ? WHERE id_boisson = ?');
                    $stmt->execute(array(($stock - $_POST["quantity_boisson"] ?? "1"), $_POST["id_boisson"]));

                    $stmt = $this->bdd->prepare('INSERT INTO client_boisson (id_client, id_boisson, quantite_client_boisson, date_client_boisson) VALUES (?, ?, ?, ?)');
                    $stmt->execute(array($slug, $_POST["id_boisson"], $_POST["quantity_boisson"] ?? 1, $_POST["debut_boisson"]));
                }
            }
        } else {
            $_POST["error"] = "error";
        }
    }

    //show all menu

    public function showMenu()
    {
        $stmt = $this->bdd->prepare("SELECT * FROM menu");
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Menu");
    }

    //add menu

    public function addMenu()
    {
        $stmt = $this->bdd->prepare("INSERT INTO client_menu (id_client, id_menu, quantite_client_menu, date_client_menu) VALUES (?, ?, ?, ?)");
        $stmt->execute(array($_POST["client_id"], $_POST["id_menu"], $_POST["quantity_menu"] ?? 1, $_POST["debut_menu"]));
    }

    //show all boisson in relation to its id_bar

    public function showBoisson($slug)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM boisson JOIN bar_boisson ON boisson.id_boisson = bar_boisson.id_boisson WHERE bar_boisson.id_bar = ?");
        $stmt->execute(array($slug));

        return $stmt->fetchAll(PDO::FETCH_CLASS, "Hotel\Models\Boisson");
    }

    //show allBar

    public function showBar()
    {
        $stmt = $this->bdd->prepare("SELECT DISTINCT bar.id_bar, bar.name_bar, bar.id_bar FROM bar JOIN bar_boisson ON bar.id_bar = bar_boisson.id_bar;");
        $stmt->execute();

        return $stmt->fetchAll();
    }

    //show table chambre, salle, menu, piscine, boisson

    public function showAll($slug)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client_boisson JOIN boisson ON client_boisson.id_boisson = boisson.id_boisson WHERE client_boisson.id_client = ?");
        $stmt->execute(array($slug));

        $boisson = $stmt->fetchAll(PDO::FETCH_CLASS, "Hotel\Models\Boisson");

        $stmt = $this->bdd->prepare("SELECT * FROM client_chambre JOIN chambre ON client_chambre.id_chambre = chambre.id_chambre WHERE client_chambre.id_client = ?");
        $stmt->execute(array($slug));

        $chambre = $stmt->fetchAll(PDO::FETCH_CLASS, "Hotel\Models\Chambre");

        $stmt = $this->bdd->prepare("SELECT * FROM client_salle JOIN salle ON client_salle.id_salle = salle.id_salle WHERE client_salle.id_client = ?");
        $stmt->execute(array($slug));

        $salle = $stmt->fetchAll(PDO::FETCH_CLASS, "Hotel\Models\Salle");

        $stmt = $this->bdd->prepare("SELECT * FROM client_piscine JOIN piscine ON client_piscine.id_piscine = piscine.id_piscine WHERE client_piscine.id_client = ?");
        $stmt->execute(array($slug));

        $piscine = $stmt->fetchAll(PDO::FETCH_CLASS, "Hotel\Models\Piscine");

        $stmt = $this->bdd->prepare("SELECT * FROM client_menu JOIN menu ON client_menu.id_menu = menu.id_menu WHERE client_menu.id_client = ?");
        $stmt->execute(array($slug));

        $menu = $stmt->fetchAll(PDO::FETCH_CLASS, "Hotel\Models\Menu");

        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE id_client = ?");
        $stmt->execute(array($slug));

        $client = $stmt->fetchAll(PDO::FETCH_CLASS, "Hotel\Models\Hotel");

        $result = [
            "boissons" => $boisson, "chambres" => $chambre, "salles" => $salle, "piscines" => $piscine, "menus" => $menu, "client" => $client
        ];

        return $result;
    }

    //add facture

    public function addFacture()
    {
        $stmt = $this->bdd->prepare("INSERT INTO facture (id_facture, id_client, num_reference, date_facture, total_ttc) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute(array($_POST["id_facture"], $_POST["id_client"], $_POST["id_client"], $_POST["date_facture"], $_POST["total_facture"]));

        return $stmt->fetchAll();
    }
}
