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
    public function client()
    {
        require VIEWS . 'Hotel/client.php'; 
    }
    public function create()
    {
        require VIEWS . 'Hotel/create.php'; 
    }
    public function create_bdd()
    {
        if($_POST['nom']==""||htmlentities($_POST['nom'])!=$_POST['nom']||$_POST['prenom']==""||htmlentities($_POST['prenom'])!=$_POST['prenom']||$_POST['email']==""||htmlentities($_POST['email'])!=$_POST['email']||$_POST['password']==""){
            $_SESSION['error']="un champ et vide ou comptien des caracter speciaux";
            header('location:../create');
        }else{
            $password = hash("sha256", $_POST['password']);
            $this->manager->insert_client($_POST['nom'], $_POST['prenom'], $_POST['email'], $password);
            header('location:../');
        }
    }
    public function liste()
    {
        $client = $this->manager->getAll_client();
        require VIEWS . 'Hotel/liste.php'; 
    }
    public function get_client()
    {
        $client = $this->manager->get_client($_POST['liste']);
        $reservation = $this->manager->get_reservations_client($_POST['liste']);
        require VIEWS . 'Hotel/info_client.php'; 
    }
}
