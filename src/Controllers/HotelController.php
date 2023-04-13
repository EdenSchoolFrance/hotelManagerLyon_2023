<?php
namespace Hotel\Controllers;

use Hotel\Models\ClientManager;
use Hotel\Validator;
use Hotel\Models\HotelManager;

/** Class HotelController **/
class HotelController {
    private $manager;
    private $validator;
    private $ClientManager;

    public function __construct() {
        $this->manager = new HotelManager();
        $this->ClientManager = new ClientManager();
        $this->validator = new Validator();
    }

    // Show all webpage for the client

    public function index() {
        require VIEWS . 'Hotel/accueil.php';
    }

    public function getionClient() {
        $allClient = $this->ClientManager->getAll();
        require VIEWS . 'Hotel/menuClient.php';
    }

    public function client() {
        require VIEWS . 'Hotel/client.php';
    }
    
    public function chambre() {
        $allClient = $this->ClientManager->getAll();
        $allChambre = $this->manager->getAllChambre();
        require VIEWS . 'Hotel/chambre.php';
    }

    public function salle() {
        $allClient = $this->ClientManager->getAll();
        $allSalle = $this->manager->getAllSalle();
        require VIEWS . 'Hotel/salle.php';
    }


    public function addClient() {

        $this->validator->validate([
            "name"=>["required", "min:3"],
            "prenom"=>["required", "min:3"],
            "mail"=>["required", "min:3", "email"],
            "tel"=>["required", "min:6", "numeric"],
        ]);

        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $info = array("mail" => $_POST["mail"], "tel" => $_POST["tel"]);
            $info["nom"] = escape($_POST["name"]);
            $info["prenom"] = escape($_POST["prenom"]);
            $this->manager->store($info);
            $_SESSION["success"] = "Client bien ajouté !";
            header("Location: /client");
        } else{
            header("Location: /client");
        }
    }

    public function addClientChambre(){
        $this->validator->validate([
            "client"=>["required"],
            "choosed"=>["required"],
            "debut"=>["required"],
            "fin"=>["required"],
        ]);
        
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $info = array("id_client"=> $_POST["client"], "id_chambre" => $_POST["choosed"], "debut" =>$_POST["debut"], "fin" => $_POST["fin"]);
            $this->manager->addClientChambre($info);
        } else{
            header("Location: /chambre");
        }
    }

    public function addClientSalle(){
        $this->validator->validate([
            "client"=>["required"],
            "choosed"=>["required"],
            "debut"=>["required"],
            "fin"=>["required"],
        ]);
        
        $_SESSION['old'] = $_POST;

        if (!$this->validator->errors()) {
            $info = array("id_client"=> $_POST["client"], "id_salle" => $_POST["choosed"], "debut" =>$_POST["debut"], "fin" => $_POST["fin"]);
            $this->manager->addClientSalle($info);
        } else{
            header("Location: /salle");
        }
    }

    public function removeClient($slug){
        $this->ClientManager->removeClient($slug);
        header("Location: /gestionclient");
    }


}
