<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;

/** Class UserController **/
class HotelController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new HotelManager();
        $this->validator = new Validator();
    }

    public function index()
    {
        require VIEWS . 'homepage.php';
    }
    public function allChambres()
    {
        $chambres = $this->manager->getAllChambres();
        require VIEWS . 'Hotel/chambres.php';
    }
}
