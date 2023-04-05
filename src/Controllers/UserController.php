<?php

namespace hotel\Controllers;

use hotel\Validator as VoyageValidator;
use hotel\Models\UserManager;

/** Class UserController **/
class UserController {
    private $userManager;
    private $validator;

    public function __construct() {
        $this->userManager = new UserManager();
        $this->validator = new VoyageValidator();
    }

    // Show all webpage for the client

    public function index() {
        require VIEWS . 'Voyage/accueil.php';
    }

    // Show login webpage for the client

    public function login() {
        require VIEWS . 'Auth/login.php';
    }

    // Show register webpage for the client

    public function register() {
        require VIEWS . 'Auth/register.php';
    }

    // Send the verification for the register 

    public function sendRegister(){
        $this->validator->validate([
            "name"=>["required", "min:3"],
            "mail"=>["required", "min:3"],
            "new-password"=>["required", "min:6", "alphaNum"],
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->userManager->find($_POST["mail"]);

            if (empty($res)) {
                $_POST['new-password'] = password_hash($_POST['new-password'], PASSWORD_BCRYPT);
                $_POST["name"] = htmlspecialchars(addslashes(trim($_POST["name"])));
                $_POST["id"] = uniqid();
                $this->userManager->store($_POST);

                $_SESSION["user"] = [
                    "id" => $_POST["id"],
                    "username" => $_POST["name"],
                    "mail" => $_POST["mail"],
                    "role"=> "user"
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['mail'] = "L'email choisi est déjà utilisé !";
                header("Location: /register");
            }
        } else {
            header("Location: /register");
        }
    }    

    // Send the verification for the login 

    public function sendLogin(){
        $this->validator->validate([
            "mail"=>["required", "min:3"],
            "password"=>["required", "min:6"]
        ]);

        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->userManager->find($_POST["mail"]);
            if ($res && password_verify($_POST['password'], $res->getPassword())) {
                $_SESSION["user"] = [
                    "id" => $res->getId(),
                    "username" => $res->getName(),
                    "role"=> $res->getPerm(),
                    "mail" => $res->getEmail()
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['message'] = "Une erreur sur les identifiants";
                header("Location: /login");
            }
        } else {
            header("Location: /login");
        }
    }

    public function deco(){
        session_destroy();
        header("Location: /");
    }
}
