<?php
namespace hotel\Controllers;

use hotel\Validator;
use hotel\Models\ClientManager;

/** Class HotelController **/
class HotelController {
    private $manager;
    private $validator;

    public function __construct() {
        $this->manager = new ClientManager();
    }

    public function index() {
        require VIEWS . 'Hotel/accueil.php';
    }

    public function list(){

        $all = $this->manager->getAllClient();
        require VIEWS . "Hotel/list.php";
    }

    public function addClientView(){
        require VIEWS . "Hotel/addClient.php";
    }

    public function addClient(){
        $this->manager->add();
        header("Location:/list");
    }

    public function deleteClient($slug){
        $this->manager->delete($slug);
        header("Location:/list");
    }

    public function updateClientView($slug){
        $client = $this->manager->getClient($slug);
        require VIEWS . "Hotel/update.php";
    }

    public function updateClient(){
        $this->manager->update();
        header("Location: /list");
    }

    public function reservationView($slug){
        $client = $this->manager->getClient($slug);
        $chambres = $this->manager->getAllChambre();
        $piscines = $this->manager->getAllPiscine();
        $salles = $this->manager->getAllSalle();
        require VIEWS . "Hotel/reservation.php";
    }

    public function addReservation(){
        $this->manager->addReservation();
        header("Location: /list");
    }

    public function commandeView($slug){
        $client = $this->manager->getClient($slug);
        $boissons = $this->manager->getAllBoisson();
        $menus = $this->manager->getAllMenu();
        require VIEWS . "Hotel/commande.php";
    }

    public function addCommandeBoisson(){
        $this->manager->addCommandeBoisson();
        header("Location: /list");
    }

    public function addCommandeMenu(){
        $this->manager->addCommandeMenu();
        header("Location: /list");
    }
}
