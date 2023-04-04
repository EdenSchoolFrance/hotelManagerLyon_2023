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

}
