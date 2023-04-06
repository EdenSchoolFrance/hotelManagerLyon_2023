<?php
namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
use Hotel\Validator;

class HotelController
{
    private $manager;
    private $validator;

    public function __construct()
    {
        $this->manager = new HotelManager();
        $this->validator = new Validator();
    }

    public function index(){
        require VIEWS . 'Hotel/index.php';
    }

    public function test(){
        require VIEWS . 'Hotel/test.php';
    }

    public function showNewClient(){
        require VIEWS . 'Hotel/newClient.php';
    }
//formulaire qui enregistre client avec ses infos
//puis 
}