<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;

/** Class UserController **/
class HotelController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new HotelManager();
        $this->validator = new Validator();
    }

    public function index() {
        require VIEWS . 'pages/homepage.php';
    }

    public function create() {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        require VIEWS . 'Hotel/create.php';
    }

    public function store() {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        $this->validator->validate([
            "name"=>["required", "min:2", "alphaNumDash"]
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["name"], $_SESSION["user"]["id"]);

            if (empty($res)) {
                $this->manager->store();
                header("Location: /dashboard/" . $_POST["name"]);
            } else {
                $_SESSION["error"]['name'] = "Le nom de la liste est déjà utilisé !";
                header("Location: /dashboard/nouveau");
            }
        } else {
            header("Location: /dashboard/nouveau");
        }
    }

    public function update($slug) {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        $this->validator->validate([
            "nameHotel"=>["required", "min:2", "alphaNumDash"]
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->find($_POST["nameHotel"], $_SESSION["user"]["id"]);

            if (empty($res) || $res->getName() == $slug) {
                $search = $this->manager->update($slug);
                header("Location: /dashboard/" . $_POST['nameHotel']);
            } else {
                $_SESSION["error"]['nameHotel'] = "Le nom de la liste est déjà utilisé !";
                header("Location: /dashboard/" . $slug);
            }

        } else {
            header("Location: /dashboard/" . $slug);
        }
    }

    public function delete($slug)
    {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        $this->manager->delete($slug);
        header("Location: /dashboard");
    }

    public function showAll() {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        $Hotels = $this->manager->getAll();

        require VIEWS . 'Hotel/index.php';
    }

    public function show($slug) {
        if (!isset($_SESSION["user"]["username"])) {
            header("Location: /login");
            die();
        }
        $Hotel = $this->manager->find($slug, $_SESSION["user"]["id"]);
        if (!$Hotel) {
            header("Location: /error");
        }
        require VIEWS . 'Hotel/show.php';
    }

}
