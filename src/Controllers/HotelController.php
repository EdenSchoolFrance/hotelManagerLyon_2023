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

    //Vue page acceuil
    public function index() {
        require VIEWS . 'Hotel/accueil.php';
    }

    //Vue page list
    public function list(){
        $all = $this->manager->getAllClient();
        require VIEWS . "Hotel/list.php";
    }

    //Vue page ajouter un client
    public function addClientView(){
        require VIEWS . "Hotel/addClient.php";
    }

    //Ajoute un client
    public function addClient(){
        $this->manager->add();
        header("Location:/list");
    }

    //Supprime un client
    public function deleteClient($slug){
        $this->manager->delete($slug);
        header("Location:/list");
    }

    //Vue page mise à jour client
    public function updateClientView($slug){
        $client = $this->manager->getClient($slug);
        require VIEWS . "Hotel/update.php";
    }

    //Met à jour un client
    public function updateClient(){
        $this->manager->update();
        header("Location: /list");
    }

    //Vue page reservation
    public function reservationView($slug){
        $client = $this->manager->getClient($slug);
        $chambres = $this->manager->getAllChambre();
        $piscines = $this->manager->getAllPiscine();
        $salles = $this->manager->getAllSalle();
        require VIEWS . "Hotel/reservation.php";
    }

    //Ajoute une reservation
    public function addReservation(){
        $this->manager->addReservation();
        header("Location: /list");
    }

    //Vue page commande
    public function commandeView($slug){
        $client = $this->manager->getClient($slug);
        $boissons = $this->manager->getAllBoisson();
        $menus = $this->manager->getAllMenu();
        require VIEWS . "Hotel/commande.php";
    }

    //Ajoute une boisson au client
    public function addCommandeBoisson(){
        $this->manager->addCommandeBoisson();
        header("Location: /list");
    }

    //Ajoute un menu au client
    public function addCommandeMenu(){
        $this->manager->addCommandeMenu();
        header("Location: /list");
    }

    //Vue page facture
    public function factureView($slug){
        $client = $this->manager->getClient($slug);
        $factures = $this->manager->getFacture($slug);

        $boissons = $this->manager->getClient_boisson($slug);
        $chambres = $this->manager->getClient_chambre($slug);
        $menus = $this->manager->getClient_menu($slug);
        $piscines = $this->manager->getClient_piscine($slug);
        $salles = $this->manager->getClient_salle($slug);

        require VIEWS . "Hotel/facture.php";
    }

    //Ajoute une facture
    public function addFacture(){
        $this->manager->addFacture();
        header("Location: /list");
    }
}
