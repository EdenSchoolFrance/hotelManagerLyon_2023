<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;

/** Class HotelController **/
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
        require VIEWS . 'Hotel/index.php';
    }
}
