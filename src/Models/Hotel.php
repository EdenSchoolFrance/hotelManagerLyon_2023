<?php

namespace Hotel\Models;

class Hotel
{
    //table client
    private $id_client;
    private $nom_client;
    private $prenom_client;
    private $email_client;
    private $mdp_client;

    //table client_salle
    private $date_debut_reservation_salle;
    private $date_fin_reservation_salle;
    private $num_reservation_salle;
    private $status_salle;

    //table salle
    private $id_salle;
    private $name_salle;
    private $description_salle;
    private $image_salle;
    private $type_salle;
    private $options_salle;

    //table client_piscine
    private $id_piscine;
    private $date_debut_reservation_piscine;
    private $date_fin_reservation_piscine;
    private $num_reservation_piscine;
    private $status_piscine;

    //table piscine
    private $name_piscine;
    private $description_piscine;
    private $image_piscine;
    private $ouverture_piscine;
    private $fermeture_piscine;
    private $nettoyage_piscine;

    //table chambre
    private $id_chambre;
    private $name_chambre;
    private $description_chambre;
    private $image_chambre;
    private $options_chambre;
    private $prix_chambre;
    private $occupe_chambre;
    private $categorie_chambre;

    //table client_chambre
    private $date_debut_reservation_chambre;
    private $date_fin_reservation_chambre;
    private $num_reservation_chambre;
    private $status_chambre;

    //table bar
    private $id_bar;
    private $name_bar;

    //table boisson
    private $id_boisson;
    private $name_boisson;
    private $description_boisson;
    private $image_boisson;
    private $prix_un_boisson;
    
    //table bar_boisson
    private $quantite_stock_bar_boisson;

    //le total
    private $total;

    //table restaurant
    private $id_restaurant;
    private $name_restaurant;

    //table menu
    private $id_menu;
    private $name_menu;
    private $description_menu;
    private $image_menu;
    private $prix_un_menu;

    //table client_boisson
    private $num_commende_boisson;
    private $quantite_client_boisson;
    private $date_client_boisson;

    //table client_menus
    private $num_commende_menu;
    private $quantite_client_menu;
    private $date_client_menu;

    //table client
    //get
    public function getIdClient()
    {
        return $this->id_client;
    }
    public function getNomClient()
    {
        return $this->nom_client ;
    }
    public function getPrenomClient()
    {
        return $this->prenom_client;
    }
    public function getEmailClient()
    {
        return $this->email_client;
    }
    public function getMdpClient()
    {
        return $this->mdp_client;
    }

    //set
    public function setIdClient(string $id_client)
    {
        $this->id_client = $id_client;
    }
    public function setNomClient(string $nom_client)
    {
        $this->nom_client = $nom_client;
    }
    public function setPrenomClient(string $prenom_client)
    {
        $this->prenom_client = $prenom_client;
    }
    public function setEmailClient(int $email_client)
    {
        $this->email_client = $email_client;
    }
    public function setMdpClient(string $mdp_client)
    {
        $this->mdp_client = $mdp_client;
    }
    
    //table client_salle
    //get
    
    public function getNumReservationSalle()
    {
        return $this->num_reservation_salle;
    }
    public function getDateDebutReservationSalle()
    {
        return $this->date_debut_reservation_salle;
    }
    public function getDateFinReservationSalle()
    {
        return $this->date_fin_reservation_salle;
    }
    public function getStatusSalle()
    {
        return $this->status_salle;
    }
    
    //set
    
    public function setNumReservationSalle($num_reservation_salle)
    {
        $this->num_reservation_salle = $num_reservation_salle;
    }
    public function setDateDebutReservationSalle($date_debut_reservation_salle)
    {
        $this->date_debut_reservation_salle = $date_debut_reservation_salle;
    }
    public function setDateFinReservationSalle($date_fin_reservation_salle)
    {
        $this->date_fin_reservation_salle = $date_fin_reservation_salle;
    }
    public function setStatusSalle($status_salle)
    {
        $this->status_salle = $status_salle;
    }
    
    //table salle
    //get
    public function getIdSalle()
    {
        return $this->id_salle;
    }
    public function getNameSalle()
    {
        return $this->name_salle ;
    }
    public function getDescriptionSalle()
    {
        return $this->description_salle;
    }
    public function getImageSalle()
    {
        return $this->image_salle;
    }
    public function getTypeSalle()
    {
        return $this->type_salle;
    }
    public function getOptionsSalle()
    {
        return $this->options_salle;
    }

    //set
    public function setIdSalle($id_salle)
    {
        $this->id_salle = $id_salle;
    }
    public function setNameSalle($name_salle)
    {
        $this->name_salle = $name_salle;
    }
    public function setDescriptionSalle($description_salle)
    {
        $this->description_salle = $description_salle;
    }
    public function setImageSalle($image_salle)
    {
        $this->image_salle = $image_salle;
    }
    public function setTypeSalle($type_salle)
    {
        $this->type_salle = $type_salle;
    }
    public function setOptionsSalle($options_salle)
    {
        $this->options_salle = $options_salle;
    }

    //table client_piscine
    //get
    public function getIdPiscine() {
        return $this->id_piscine;
    }

    public function getDateDebutReservationPiscine() {
        return $this->date_debut_reservation_piscine;
    }

    public function getDateFinReservationPiscine() {
        return $this->date_fin_reservation_piscine;
    }

    public function getNumReservationPiscine() {
        return $this->num_reservation_piscine;
    }

    public function getStatusPiscine() {
        return $this->status_piscine;
    }

    //set
    public function setIdPiscine($id_piscine) {
        $this->id_piscine = $id_piscine;
    }

    public function setDateDebutReservationPiscine($date_debut_reservation_piscine) {
        $this->date_debut_reservation_piscine = $date_debut_reservation_piscine;
    }

    public function setDateFinReservationPiscine($date_fin_reservation_piscine) {
        $this->date_fin_reservation_piscine = $date_fin_reservation_piscine;
    }

    public function setNumReservationPiscine($num_reservation_piscine) {
        $this->num_reservation_piscine = $num_reservation_piscine;
    }

    public function setStatusPiscine($status_piscine) {
        $this->status_piscine = $status_piscine;
    }

    //table piscine
    //get
    public function getNamePiscine() {
        return $this->name_piscine;
    }

    public function getDescriptionPiscine() {
        return $this->description_piscine;
    }

    public function getImagePiscine() {
        return $this->image_piscine;
    }

    public function getOuverturePiscine() {
        return $this->ouverture_piscine;
    }

    public function getFermeturePiscine() {
        return $this->fermeture_piscine;
    }

    public function getNettoyagePiscine() {
        return $this->nettoyage_piscine;
    }

    //set
    public function setNamePiscine($name_piscine) {
        $this->name_piscine = $name_piscine;
    }

    public function setDescriptionPiscine($description_piscine) {
        $this->description_piscine = $description_piscine;
    }

    public function setImagePiscine($image_piscine) {
        $this->image_piscine = $image_piscine;
    }

    public function setOuverturePiscine($ouverture_piscine) {
        $this->ouverture_piscine = $ouverture_piscine;
    }

    public function setFermeturePiscine($fermeture_piscine) {
        $this->fermeture_piscine = $fermeture_piscine;
    }

    public function setNettoyagePiscine($nettoyage_piscine) {
        $this->nettoyage_piscine = $nettoyage_piscine;
    }
    //get
    public function getIdChambre() {
        return $this->id_chambre;
    }

    public function getNameChambre() {
        return $this->name_chambre;
    }

    public function getDescriptionChambre() {
        return $this->description_chambre;
    }

    public function getImageChambre() {
        return $this->image_chambre;
    }

    public function getOptionsChambre() {
        return $this->options_chambre;
    }

    public function getPrixChambre() {
        return $this->prix_chambre;
    }

    public function getOccupeChambre() {
        return $this->occupe_chambre;
    }

    public function getCategorieChambre() {
        return $this->categorie_chambre;
    }

    //set
    public function setIdChambre($id_chambre) {
        $this->id_chambre = $id_chambre;
    }

    public function setNameChambre($name_chambre) {
        $this->name_chambre = $name_chambre;
    }

    public function setDescriptionChambre($description_chambre) {
        $this->description_chambre = $description_chambre;
    }

    public function setImageChambre($image_chambre) {
        $this->image_chambre = $image_chambre;
    }

    public function setOptionsChambre($options_chambre) {
        $this->options_chambre = $options_chambre;
    }

    public function setPrixChambre($prix_chambre) {
        $this->prix_chambre = $prix_chambre;
    }

    public function setOccupeChambre($occupe_chambre) {
        $this->occupe_chambre = $occupe_chambre;
    }

    public function setCategorieChambre($categorie_chambre) {
        $this->categorie_chambre = $categorie_chambre;
    }

    //table client_chambre
    //get
    public function getDateDebutReservationChambre() {
        return $this->date_debut_reservation_chambre;
    }
    
    public function getDateFinReservationChambre() {
        return $this->date_fin_reservation_chambre;
    }
    
    public function getNumReservationChambre() {
        return $this->num_reservation_chambre;
    }
    
    public function getStatusChambre() {
        return $this->status_chambre;
    }
    
    //set
    public function setDateDebutReservationChambre($date_debut_reservation_chambre) {
        $this->date_debut_reservation_chambre = $date_debut_reservation_chambre;
    }
    
    public function setDateFinReservationChambre($date_fin_reservation_chambre) {
        $this->date_fin_reservation_chambre = $date_fin_reservation_chambre;
    }
    
    public function setNumReservationChambre($num_reservation_chambre) {
        $this->num_reservation_chambre = $num_reservation_chambre;
    }
    
    public function setStatusChambre($status_chambre) {
        $this->status_chambre = $status_chambre;
    }

    //table bar
    //get
    public function getIdBar() {
        return $this->id_bar;
    }
    public function getNameBar() {
        return $this->name_bar;
    }

    //set
    public function setIdBar($id_bar) {
        $this->id_bar = $id_bar;
    }
    public function setNameBar($name_bar) {
        $this->name_bar = $name_bar;
    }
    
    //table boisson
    //get
    public function getIdBoisson() {
        return $this->id_boisson;
    }
    
    public function getNameBoisson() {
        return $this->name_boisson;
    }
    
    public function getDescriptionBoisson() {
        return $this->description_boisson;
    }
    
    public function getImageBoisson() {
        return $this->image_boisson;
    }
    
    public function getPrix_unBoisson() {
        return $this->prix_un_boisson;
    }

    //set
    public function setIdBoisson($id_boisson) {
        $this->id_boisson = $id_boisson;
    }
    
    public function setNameBoisson($name_boisson) {
        $this->name_boisson = $name_boisson;
    }
    
    public function setDescriptionBoisson($description_boisson) {
        $this->description_boisson = $description_boisson;
    }
    
    public function setImageBoisson($image_boisson) {
        $this->image_boisson = $image_boisson;
    }
    
    public function setPrixUnBoisson($prix_un_boisson) {
        $this->prix_un_boisson = $prix_un_boisson;
    }

    //table bar_boisson
    //get
    public function getQuantiteBoisson() {
        return $this->quantite_stock_bar_boisson;
    }
    //set
    public function setQuantiteBoisson($quantite_stock_bar_boisson) {
        $this->quantite_stock_bar_boisson = $quantite_stock_bar_boisson;
    }
    
    //le total
    //get
    public function getTotal() {
        return $this->total;
    }
    //set
    public function setTotal($total) {
        $this->total = $total;
    }
    
    //table restaurant
    //get
    public function getIdRestaurant() {
        return $this->id_restaurant;
    }
    public function getNameRestaurant() {
        return $this->name_restaurant;
    }

    //set
    public function setIdRestaurant($id) {
        $this->id_restaurant = $id;
    }
    public function setNameRestaurant($name) {
        $this->name_restaurant = $name;
    }

    //table menu
    //get
    public function getIdMenu() {
        return $this->id_menu;
    }

    public function getNameMenu() {
      return $this->name_menu;
    }

    public function getDescriptionMenu() {
      return $this->description_menu;
    }

    public function getImageMenu() {
      return $this->image_menu;
    }

    public function getPrixUnMenu() {
      return $this->prix_un_menu;
    }
    
    //set
    public function setIdMenu($id) {
        $this->id_menu = $id;
    }

    public function setNameMenu($name) {
      $this->name_menu = $name;
    }

    public function setDescriptionMenu($description) {
      $this->description_menu = $description;
    }

    public function setImageMenu($image) {
      $this->image_menu = $image;
    }

    public function setPrixUnMenu($prix) {
      $this->prix_un_menu = $prix;
    }

    //table client_boisson
    //get
    public function getNumCommendeBoisson() {
        return $this->num_commende_boisson;
    }


    public function getQuantiteClientBoisson() {
      return $this->quantite_client_boisson;
    }

    public function getDateClientBoisson() {
      return $this->date_client_boisson;
    }

    //set
    public function setNumCommendeBoisson($num) {
        $this->num_commende_boisson = $num;
    }

    public function setQuantiteClientBoisson($quantite) {
      $this->quantite_client_boisson = $quantite;
    }

    public function setDateClientBoisson($date) {
      $this->date_client_boisson = $date;
    }

    //table client_menu
    //get
    public function getNumCommendeMenu() {
        return $this->num_commende_menu;
    }
    public function getQuantiteClientMenu() {
      return $this->quantite_client_menu;
    }

    public function getDateClientMenu() {
      return $this->date_client_menu;
    }

    //set

    public function setNumCommendeMenu($num) {
        $this->num_commende_menu = $num;
    }
    public function setQuantiteClientMenu($quantite) {
      $this->quantite_client_menu = $quantite;
    }

    public function setDateClientMenu($date) {
      $this->date_client_menu = $date;
    }
}

