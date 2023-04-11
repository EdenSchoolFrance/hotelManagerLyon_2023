<?php

namespace Hotel\Controllers;

use Hotel\Models\HotelManager;
//les use permetteron de creer les variable des manager
/** Class UserController **/
class HotelController
{
    private $manager;

    public function __construct()
    {
        $this->manager = new HotelManager();
        //variable pour tous les manager
    }

    public function index()
    {
        require VIEWS . 'Hotel/homepage.php';
    }

}
