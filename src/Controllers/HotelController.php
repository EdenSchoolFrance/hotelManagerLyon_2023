<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;

/** Class UserController **/
class HotelController
{
    private $manager;
    private $validator;

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
        require VIEWS . "pages/showClient.php";
    }

    public function removeClient($slug)
    {
        $this->manager->removeClient($slug);
        header("Location: /showClients");
    }

    public function showUpdateClient($slug)
    {
        $el = $this->manager->showSpecifiqueClient($slug);
        require VIEWS . "pages/updateClient.php";
    }

    public function updateClient($slug)
    {
        $this->manager->updateClient($slug);
        header("Location: /showClients");
    }

    public function showReservation($slug)
    {
        require VIEWS . "pages/reservation.php";
    }

    public function showChambre()
    {
        $item = $this->manager->showChambre();
        require VIEWS . "pages/chambre.php";
    }

    public function showResto()
    {
        $item = $this->manager->showResto();
        require VIEWS . "pages/resto.php";
    }
}
