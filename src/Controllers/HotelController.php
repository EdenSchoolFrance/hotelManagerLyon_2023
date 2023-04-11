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
            header('location:./create');
        }else{
            $password = hash("sha256", $_POST['password']);
            $this->manager->insert_client($_POST['nom'], $_POST['prenom'], $_POST['email'], $password);
            header('location:./');
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
    public function update()
    {
        $client = $this->manager->getAll_client();
        require VIEWS . 'Hotel/update.php'; 
    }
    public function update_bdd()
    {
        if(htmlentities($_POST['nom'])!=$_POST['nom']||htmlentities($_POST['prenom'])!=$_POST['prenom']||htmlentities($_POST['email'])!=$_POST['email']){
            $_SESSION['error']="un champ et vide ou comptien des caracter speciaux";
            header('location:./update');
        }else{
            $client = $this->manager->get_client($_POST["liste"]);
            if($_POST['nom']==""){
                $nom="'".$client[0]->getNomClient()."'";
            }else{
                $nom = "'".$_POST['nom']."'";
            }
            if($_POST['prenom']==""){
                $prenom="'".$client[0]->getPrenomClient()."'";
            }else{
                $prenom = "'".$_POST['prenom']."'";
            }
            if($_POST['email']==""){
                $email="'".$client[0]->getEmailClient()."'";
            }else{
                $email = "'".$_POST['email']."'";
            }
            if($_POST['password']==""){
                $password="'".$client[0]->getMdpClient()."'";
            }else{
                $password = "'".$_POST['password']."'";
                $password = hash("sha256", $_POST['password']);
            }
            $this->manager->update_client($nom,$prenom,$email,$password,$_POST["liste"]);
            header('location:./');
        }
    }
    public function delete()
    {
        $client = $this->manager->getAll_client();
        require VIEWS . 'Hotel/delete.php'; 
    }
    public function delete_bdd(){
        for ($i=0; $i < sizeof($_POST['client']); $i++) { 
            $this->manager->delete_client($_POST['client'][$i]);
        }
        header('location:./'); 
    }
}
