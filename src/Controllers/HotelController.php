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
        require VIEWS . "Hotel/list.php";
    }

    public function addClientView(){
        require VIEWS . "Hotel/addClient.php";
    }

    public function addClient(){
        $this->manager->add();
        header("Location:/addClient.php");
    }
}
