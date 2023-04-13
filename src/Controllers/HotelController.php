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
                header("Location: /");
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
        header("Location: /");
    }

    public function showUpdateClient($slug)
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /");
        }
        $el = $this->manager->showSpecifiqueClient($slug);
        require VIEWS . "pages/updateClient.php";
    }

    public function updateClient($slug)
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /");
        }
        $this->manager->updateClient($slug);
        header("Location: /");
    }

    public function showReservation($slug)
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /");
        }
        $resto = $this->manager->showRestoSpecifique();
        $chambre = $this->manager->showChambreSpecifique();
        $bar = $this->manager->showBar();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/');
        require VIEWS . "pages/reservation.php";
    }

    public function showChambre()
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /");
        }
        $item = $this->manager->showChambre();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/');
        $this->addBreadcrumb('Reservation', '/reservation/' . $_SESSION["idUser"]);
        require VIEWS . "pages/chambre.php";
    }

    public function showResto()
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /");
        }
        $item = $this->manager->showResto();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/');
        $this->addBreadcrumb('Reservation', '/reservation/' . $_SESSION["idUser"]);
        require VIEWS . "pages/resto.php";
    }

    public function showPiscine()
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /");
        }
        $item = $this->manager->showPiscine();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/');
        $this->addBreadcrumb('Reservation', '/reservation/' . $_SESSION["idUser"]);
        require VIEWS . "pages/piscine.php";
    }

    public function showSalle()
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /");
        }
        $item = $this->manager->showSalle();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/');
        $this->addBreadcrumb('Reservation', '/reservation/' . $_SESSION["idUser"]);
        require VIEWS . "pages/salle.php";
    }

    public function addReservation()
    {
        if (!isset($_SESSION["idUser"])) {
            header("Location: /");
        }
        if (isset($_POST["id_resto"])) {
            if (!isset($_COOKIE["restaurant" . $_SESSION["idUser"]])) {
                setcookie("restaurant_" . $_SESSION['idUser'] . "", true, time() + (86400 * 30), "/");
            }
        }
        $this->manager->reservation($_SESSION["idUser"]);
        if ($_POST["error"]) {
            header("Location: /reservation/" . $_SESSION["idUser"] . "/error");
        } else {
            header("Location: /");
        }
    }

    public function addBreadcrumb($title, $url)
    {
        $this->breadcrumbs[] = ["title" => $title, "url" => $url];
    }

    public function deleteMenu($slug)
    {
        setcookie("restaurant_" . $slug, "", time() - 3600, "/");
        header("Location: /");
    }

    public function showMenu()
    {
        $item = $this->manager->showMenu();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/');
        require VIEWS . "pages/menu.php";
    }

    public function addMenu()
    {
        $this->manager->addMenu();
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/');
        $this->addBreadcrumb('Reservation', '/reservation/' . $_SESSION["idUser"]);
        header("Location: /");
    }

    public function showBoisson($slug)
    {
        $item = $this->manager->showBoisson($slug);
        $this->addBreadcrumb('Accueil', '/');
        $this->addBreadcrumb('ShowClients', '/');
        $this->addBreadcrumb('Reservation', '/reservation/' . $_SESSION["idUser"]);
        require VIEWS . "pages/boissons.php";
    }
}
