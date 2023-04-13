<?php

namespace Hotel\Controllers;

use Hotel\Models\ClientManager;
use Hotel\Models\FoodManager;
use Hotel\Validator;

/** Class FoodController **/
class FoodController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new FoodManager();
        $this->validator = new Validator();
    }

    //afficher tout les restaurants et bar de l'hotel
    public function allRestoBar()
    {
        $restaurants = $this->manager->getAllResto();
        $bars = $this->manager->getAllBar();
        require VIEWS . 'Hotel/restaurant_bar.php';
    }

    //afficher les plats d'un restaurant /  boissons d'un bar
    public function restaurant($slug)
    {
        $restaurant = $this->manager->getRestaurant($slug);
        $menus = $this->manager->getMenuByRestaurant($slug);
        require VIEWS . 'Hotel/restaurant.php';
    }
    public function bar($slug)
    {
        $bar = $this->manager->getBar($slug);
        $boissons = $this->manager->getBoissonsByBar($slug);
        require VIEWS . 'Hotel/bar.php';
    }

    //afficher le formulaire de commande d'un menu / boisson
    public function commandMenu($slug)
    {
        $menu = $this->manager->getMenu($slug);
        $clientManager = new ClientManager();
        $clients = $clientManager->getAllClients();
        require VIEWS . 'Hotel/commandMenu.php';
    }
    public function commandBoisson($slug)
    {
        $boisson = $this->manager->getBoisson($slug);
        $clientManager = new ClientManager();
        $clients = $clientManager->getAllClients();
        require VIEWS . 'Hotel/commandBoisson.php';
    }

    //valider la commande d'un menu ou d'une boisson
    public function validCommandMenu()
    {
        $this->validator->validate([
            "quantity" => ["required", "numeric"],
            "client" => ["required", "numeric"],
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $this->manager->validCommandMenu();
            header('Location: /commandMenu/' . $_POST['idMenu'] . '?valid=true');
        } else {
            header('Location: /commandMenu/' . $_POST['idMenu']);
        }
    }
    public function validCommandBoisson()
    {
        $this->validator->validate([
            "quantity" => ["required", "numeric"],
            "client" => ["required", "numeric"],
        ]);
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $this->manager->validCommandBoisson();
            $this->manager->destock($_POST['idBoisson']);
            header('Location: /commandBoisson/' . $_POST['idBoisson'] . '?valid=true');
        } else {
            header('Location: /commandBoisson/' . $_POST['idBoisson']);
        }
    }
}
