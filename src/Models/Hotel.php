<?php
namespace Hotel\Models;

class Hotel {
    //CHAMBRE
        private $id_chambre;
        private $name_chambre;
        private $description_chambre;
        private $image_chambre;
        private $options_chambre;
        private $prix_chambre;
        private $occupe_chambre;
        private $categorie_chambre;

    //MENUS
        private $id_menu;
        private $id_restaurant;
        private $name_menu;
        private $description_menu;
        private $image_menu;
        private $prix_menu;

        public function getIdChambre(){
            return $this->id_chambre;
        }

        public function setIdChambre($id_chambre){
            $this->id_chambre = $id_chambre;
        }

        public function getNameChambre(){
            return $this->name_chambre;
        }

        public function setNameChambre($name_chambre){
            $this->name_chambre = $name_chambre;
        }

        public function getDescriptionChambre(){
            return $this->description_chambre;
        }

        public function setDescriptionChambre($description_chambre){
            $this->description_chambre = $description_chambre;
        }

        public function getImageChambre(){
            return $this->image_chambre;
        }

        public function setImageChambre($image_chambre){
            $this->image_chambre = $image_chambre;
        }

        public function getOptionsChambre(){
            return $this->options_chambre;
        }

        public function setOptionsChambre($options_chambre){
            $this->options_chambre = $options_chambre;
        }

        public function getPrixChambre(){
            return $this->prix_chambre;
        }

        public function setPrixChambre($prix_chambre){
            $this->prix_chambre = $prix_chambre;
        }

        public function getOccupeChambre(){
            return $this->occupe_chambre;
        }

        public function setOccupeChambre($occupe_chambre){
            $this->occupe_chambre = $occupe_chambre;
        }

        public function getCategorieChambre(){
            return $this->categorie_chambre;
        }

        public function setCategorieChambre($categorie_chambre){
            $this->categorie_chambre = $categorie_chambre;
        }

        

    

        public function getIdMenu()
        {
                return $this->id_menu;
        }

        public function setIdMenu($id_menu)
        {
                $this->id_menu = $id_menu;
        }

        /**
         * Get the value of id_restaurant
         */ 
        public function getIdRestaurant()
        {
                return $this->id_restaurant;
        }

        public function setIdRestaurant($id_restaurant)
        {
                $this->id_restaurant = $id_restaurant;
        }

        public function getNameMenu()
        {
                return $this->name_menu;
        }

        public function setNameMenu($name_menu)
        {
                $this->name_menu = $name_menu;
        }

        public function getDescriptionMenu()
        {
                return $this->description_menu;
        }


        public function setDescriptionMenu($description_menu)
        {
                $this->description_menu = $description_menu;
        }

        public function getImageMenu()
        {
                return $this->image_menu;
        }

        public function setImageMenu($image_menu)
        {
                $this->image_menu = $image_menu;
        }

        public function getPrixMenu()
        {
                return $this->prix_menu;
        }

        public function setPrixMenu($prix_menu)
        {
                $this->prix_menu = $prix_menu;
        }
}