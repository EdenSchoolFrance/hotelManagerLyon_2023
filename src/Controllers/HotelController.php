<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;

/** Class UserController **/
class HotelController
{
    private $manager;
    private $validator;
    private $breadcrumbs = [];
    private $addBreadcrumb;

    public function __construct()
    {
        $this->manager = new HotelManager();
        $this->validator = new Validator();
    }

    public function index()
    {
        require VIEWS . 'pages/addClient.php';
    }

    public function addClient()
    {
        $this->validator->validate([
            "firstName" => ["required", "min:3", "alpha"],
            "lastName" => ["required", "min:3", "alpha"],
            "email" => ["required", "min:6", "email"]
        ]);
        $res = $this->manager->find($_POST["email"]);
        if (!$this->validator->errors()) {
            if (!$res) {
                $this->manager->addClient();
                header("Location: /showClients");
            } else {
                $_SESSION["error"]["email"] = "L'email entré est déjà utilisé";
                header("Location: /addClients/error");
            }
        } else {
            header("Location: /addClients/error");
        }
    }

    public function showClients()
    {
        $el = $this->manager->show();
        $this->addBreadcrumb('Accueil', '/');
        require VIEWS . "pages/showClient.php";
    }

    public function removeClient($slug)
    {
        $this->manager->removeClient($slug);
        header("Location: /showClients");
    }

    public function showUpdateClient($slug)
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /showClients");
        }
        $el = $this->manager->showSpecifiqueClient($slug);
        require VIEWS . "pages/updateClient.php";
    }

    public function updateClient($slug)
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /showClients");
        }
        $this->manager->updateClient($slug);
        header("Location: /showClients");
    }

    public function showReservation($slug)
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /showClients");
        }
        $resto = $this->manager->showRestoSpecifique();
        $chambre = $this->manager->showChambreSpecifique();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/ShowClients');
        require VIEWS . "pages/reservation.php";
    }

    public function showChambre()
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /showClients");
        }
        $item = $this->manager->showChambre();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/ShowClients');
        $this->addBreadcrumb('Reservation', '/reservation/' . $_SESSION["idUser"]);
        require VIEWS . "pages/chambre.php";
    }

    public function showResto()
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /showClients");
        }
        $item = $this->manager->showResto();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/ShowClients');
        $this->addBreadcrumb('Reservation', '/reservation/' . $_SESSION["idUser"]);
        require VIEWS . "pages/resto.php";
    }

    public function showPiscine()
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /showClients");
        }
        $item = $this->manager->showPiscine();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/ShowClients');
        $this->addBreadcrumb('Reservation', '/reservation/' . $_SESSION["idUser"]);
        require VIEWS . "pages/piscine.php";
    }

    public function showSalle()
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /showClients");
        }
        $item = $this->manager->showSalle();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/ShowClients');
        $this->addBreadcrumb('Reservation', '/reservation/' . $_SESSION["idUser"]);
        require VIEWS . "pages/salle.php";
    }

    public function addReservation()
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /showClients");
        }
        if (isset($_POST["id_resto"])) {
            setcookie("restaurant_" . $_SESSION['idUser'] . "", true, time() + (86400 * 30), "/");
        }
        $this->manager->reservation($_SESSION["idUser"]);
        header("Location: /reservation/" . $_SESSION["idUser"]);
    }

    public function addBreadcrumb($title, $url)
    {
        $this->breadcrumbs[] = ["title" => $title, "url" => $url];
    }
}
