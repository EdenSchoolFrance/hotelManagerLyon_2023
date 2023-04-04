<?php

namespace Hotel\Controllers;

use Hotel\Models\UserManager;
use Hotel\Validator;

/** Class HotelController **/
class UserController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new UserManager();
        $this->validator = new Validator();
    }

    public function index()
    {
        require VIEWS . 'Hotel/index.php';
    }

    public function showRegister()
    {
        require VIEWS . 'Auth/register.php';
    }

    public function showLogin()
    {
        require VIEWS . 'Auth/login.php';
    }

    public function logout()
    {
        session_start();
        session_destroy();
        header('Location: /');
    }

    public function register()
    {
        $this->validator->validate([
            "username" => ["required", "min:3", "alphaNum"],
            "password" => ["required", "min:6", "alphaNum"]
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $res = $this->manager->findUser($_POST["username"]);

            if (empty($res)) {
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $this->manager->storeUser($password);

                $_SESSION["user"] = [
                    "id" => $this->manager->getBdd()->lastInsertId(),
                    "username" => $_POST["username"]
                ];
                header("Location: /");
            } else {
                $_SESSION["error"]['username'] = "Le username choisi est déjà utilisé !";
                header("Location: /register");
            }
        } else {
            header("Location: /register");
        }
    }

    public function login()
    {
        $_SESSION['old'] = $_POST;
        $res = $this->manager->findUser($_POST["login"]);
        if ($res && password_verify($_POST['password'], $res->getPassword())) {
            $_SESSION["user"] = [
                "id" => $res->getIdUser(),
                "username" => $res->getNomUser()
            ];
            header("Location: /");
        } else {
            $_SESSION["error"]['message'] = "Une erreur sur les identifiants";
            header("Location: /login");
        }
    }


}
