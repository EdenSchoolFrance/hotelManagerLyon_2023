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
        $reservationPiscine = $this->manager->get_reservations_Piscine_client($_POST['liste']);
        $reservationChambre = $this->manager->get_reservations_chambre_client($_POST['liste']);
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
    public function salle(){
        $option='salle';
        require VIEWS . 'Hotel/salle.php'; 
    }
    public function salle_create(){
        $client = $this->manager->getAll_client();
        $salle = $this->manager->getAll_salle();
        $option='Salle';
        require VIEWS . 'Hotel/salle_create.php'; 
    }
    public function salle_create_bdd()
    {
        if($_POST['status_salle']==""||htmlentities($_POST['status_salle'])!=$_POST['status_salle']||$_POST["datedeb"] > $_POST["datefin"]){
            $_SESSION['error']="un champ et vide ou comptien des caracter speciaux ou la date de debut est apres celle de fin";
            header('location:./');
        }else{
            $verif = $this->manager->verif_reserver($_POST['salle']);
            if($verif[0]->getTypeSalle()=="reserver"){
                $_SESSION["error"]="salle deja reserver";
                header('location:./');
            }else{
                $date = date_create($_POST['datedeb']);
                $date1 = date_create($_POST['datefin']);
                $this->manager->insert_reservation($_POST['client'],$_POST['salle'],date_format($date, 'Y-m-d'),date_format($date1, 'Y-m-d'),$_POST ['status_salle']);
                header('location:../');
            }
        }
    }
    public function piscine(){
        $option='piscine';
        require VIEWS . 'Hotel/salle.php'; 
    }
    public function piscine_create(){
        $client = $this->manager->getAll_client();
        $piscine = $this->manager->getAll_piscine();
        $option='Piscine';
        require VIEWS . 'Hotel/salle_create.php'; 
    }
    public function piscine_create_bdd()
    {
        if($_POST['status_salle']==""||htmlentities($_POST['status_salle'])!=$_POST['status_salle']||$_POST["datedeb"] > $_POST["datefin"]){
            $_SESSION['error']="un champ et vide ou comptien des caracter speciaux ou la date de debut est apres celle de fin";
            header('location:./');
        }else{
            $date = date_create($_POST['datedeb']);
            $date1 = date_create($_POST['datefin']);
            $verif = $this->manager->verif_reserver_piscine($_POST['salle'],date_format($date, 'Y-m-d'),date_format($date1, 'Y-m-d'),$_POST['datetime']);
            if($verif){
                $this->manager->insert_reservation_piscine($_POST['client'],$_POST['salle'],date_format($date, 'Y-m-d'),date_format($date1, 'Y-m-d'),$_POST['status_salle']);
                header('location:../');
            }else{
                $_SESSION["error"]="la piscine et fermer ou un nettoyage et pendant la date";
                header('location:./');
            }
        }
    }
    public function chambre(){
        $option='chambre';
        require VIEWS . 'Hotel/salle.php'; 
    }
    public function chambre_create(){
        $client = $this->manager->getAll_client();
        $chambre = $this->manager->getAll_chambre();
        $option='Chambre';
        require VIEWS . 'Hotel/salle_create.php'; 
    }
    public function chambre_create_bdd()
    {
        if($_POST['status_salle']==""||htmlentities($_POST['status_salle'])!=$_POST['status_salle']||$_POST['noccupe']==""||$_POST['noccupe']<=0||htmlentities($_POST['noccupe'])!=$_POST['noccupe']||$_POST["datedeb"] > $_POST["datefin"]){
            $_SESSION['error']="un champ et vide ou comptien des caracter speciaux ou la date de debut est apres celle de fin ou il ya moin de 0 occupent qui reserve";
            header('location:./');
        }else{
            $verif = $this->manager->verif_reserver_chambre($_POST['salle']);
            if($verif[0]->getOccupeChambre()!="0"){
                $_SESSION["error"]="chambre deja reserver";
                header('location:./');
            }else{
                $date = date_create($_POST['datedeb']);
                $date1 = date_create($_POST['datefin']);
                $this->manager->insert_reservation_chambre($_POST['client'],$_POST['salle'],date_format($date, 'Y-m-d'),date_format($date1, 'Y-m-d'),$_POST ['status_salle']);
                $this->manager->update_reservation_chambre($_POST['noccupe'],$_POST['salle']);
                header('location:../');
            }
        }
    }
}
