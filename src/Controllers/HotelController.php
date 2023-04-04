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

    public function showReservation(){ 
      $chambres = $this->manager->reservation();
        require VIEWS . 'Hotel/reservation.php';

       
        if (isset($_GET['reservation/ch:IdChambre'])) {
            $menus = $this->manager->getMenus();
            require VIEWS . 'Hotel/menu.php';
        }
        else{
            echo 'no';
        }
        
    }

    /*
    public function showMenus()
    {
        $menus = $this->manager->getMenus();
        require VIEWS . 'Hotel/menu.php';
    }*/

}