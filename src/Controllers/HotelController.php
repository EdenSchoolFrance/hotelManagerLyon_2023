<?php
namespace Hotel\Controllers;
use Hotel\Validator;
use Hotel\Models\HotelManager;

/** Class HotelController **/
class HotelController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new HotelManager();
        $this->validator = new Validator();
    }

    // Show all webpage for the client

    public function index() {
        require VIEWS . 'Hotel/accueil.php';
    }

    public function client() {
        require VIEWS . 'Hotel/client.php';
    }

    public function addClient() {

        $this->validator->validate([
            "name"=>["required", "min:3"],
            "prenom"=>["required", "min:3"],
            "mail"=>["required", "min:3", "email"],
            "tel"=>["required", "min:6", "numeric"],
        ]);

        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $info = array("mail" => $_POST["mail"], "tel" => $_POST["tel"]);
            $info["nom"] = htmlspecialchars(addslashes(trim($_POST["name"])));
            $info["prenom"] = htmlspecialchars(addslashes(trim($_POST["prenom"])));
            $this->manager->store($info);
            $_SESSION["success"] = "Client bien ajouté !";
            header("Location: /client");
        } else{
            header("Location: /client");
        }
    }

}
