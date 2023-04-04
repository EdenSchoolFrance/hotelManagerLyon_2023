<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;
//les use permetteron de creer les variable des manager
/** Class UserController **/
class HotelController
{
    //private $manager;
    private $validator;
    private $manager;

    public function __construct()
    {
        $this->manager = new HotelManager();
        $this->validator = new Validator();
        //variable pour tous les manager
    }

    public function index()
    {
        require VIEWS . 'Hotel/homepage.php';
    }

    public function catalog()
    {
        $voyages = $this->manager->getAll();
        require VIEWS . 'Phoenix/catalog.php';
    }
    public function reservation($slug)
    {
        $voyages = $this->manager->getAllLimit();
        $commende = $this->manager->getVoyage($slug);
        require VIEWS . 'Phoenix/reservation.php';
    }
    public function vacances()
    {

        if (!$_SESSION['user']) {
            $_SESSION['erreur'] = "vous n'ete pas connecter";
            header("Location:/login");
        } else {
            $uuid = uniqid();
            $prix = $this->manager->getVoyage($_POST['id_destination']);
            $prix_total = 0;
            $prix_total += $prix->getPrixDestination() * $_POST['Semaine'] * $_POST['vacanciers'];
            $commende = $this->commandes->store($uuid, $_SESSION['user']['id'], $_POST['id_destination'], $_POST['Semaine'], $_POST['vacanciers'], $prix_total);
            header('location:/commande/' . $uuid . '/');
        }
    }
    public function filtred($slug)
    {
        $voyages = $this->manager->getAllFiltred($slug);
        require VIEWS . 'Phoenix/catalog.php';
    }
    public function registerView()
    {
        require VIEWS . 'user/register.php';
    }
    public function loginView()
    {
        require VIEWS . 'user/login.php';
    }
    public function register()
    {
        $uuid = uniqid();
        $password = crypt($_POST['Password'], '$5$rounds=5000$usesomesillystringforsalt$');
        if ($_POST['Password'] == $_POST['PasswordVerif'] && htmlentities($_POST['Email'])) {
            $this->user->store($uuid, $password);
            $_SESSION["user"] = [
                "id" => $uuid,
                "email" => $_POST["Email"],
                "permissions" => 0
            ];
            require VIEWS . 'Phoenix/homepage.php';
        } else {
            $_SESSION['erreur'] = 'caractere specieux dans le mail mot de passe de verif pas egale au mot de passe';
            header('location:/register');
        }
    }
    public function login()
    {
        $password = crypt($_POST['Password'], '$5$rounds=5000$usesomesillystringforsalt$');
        $cherche = $this->user->search($password);
        $_SESSION["password"] = $password;
        if ($cherche) {
            $_SESSION["user"] = [
                "id" => $cherche[0]->getIdUser(),
                "email" => $cherche[0]->getEmail(),
                "permissions" => $cherche[0]->getPermissions()
            ];
            require VIEWS . 'Phoenix/homepage.php';
        } else {
            $_SESSION['erreur'] = 'une des informations est incorrecte';
            header('location:/login');
        }
    }
    public function logout()
    {
        unset($_SESSION['user']);
        //detruit la session user (id,mail,permission) puis lien vers la page d'accueil
        require VIEWS . 'Phoenix/homepage.php';
    }
    public function recu($slug)
    {
        if (isset($_SESSION['user']['id'])) {
            $cherche = $this->commandes->search($slug, $_SESSION['user']['id']);
            $voyages = $this->manager->getVoyage($cherche[0]->getId());
            $Allvoyages = $this->manager->getAllLimit();
            if ($cherche) {
                require VIEWS . 'Phoenix/recu.php';
            }
        }
    }
}
