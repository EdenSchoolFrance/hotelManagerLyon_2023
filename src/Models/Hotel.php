<?php

namespace Hotel\Models;

class Hotel
{
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

        //RESTAURANTS
        private $name_restaurant;

        //BARS
        private $id_bar;
        private $name_bar;

        //PISCINE
        private $id_piscine;
        private $name_piscine;
        private $description_piscine;
        private $image_piscine;
        private $ouverture_piscine;
        private $fermeture_piscine;
        private $nettoyage_piscine;

        //SALLES
        private $id_salle;
        private $name_salle;
        private $description_salle;
        private $image_salle;
        private $type_salle;
        private $options_salle;

        //BOISSONS
        private $id_boisson;
        private $name_boisson;
        private $description_boisson;
        private $image_boisson;
        private $prix_boisson;

        //CLIENTS
        private $id_client;
        private $nom_client;
        private $prenom_client;
        private $email_client;


        

        public function getNameChambre()
        {
                return $this->name_chambre;
        }

        public function setNameChambre($name_chambre)
        {
                $this->name_chambre = $name_chambre;
        }

        public function getDescriptionChambre()
        {
                return $this->description_chambre;
        }

        public function setDescriptionChambre($description_chambre)
        {
                $this->description_chambre = $description_chambre;
        }

        public function getImageChambre()
        {
                return $this->image_chambre;
        }

        public function setImageChambre($image_chambre)
        {
                $this->image_chambre = $image_chambre;
        }

        public function getOptionsChambre()
        {
                return $this->options_chambre;
        }

        public function setOptionsChambre($options_chambre)
        {
                $this->options_chambre = $options_chambre;
        }

        public function getPrixChambre()
        {
                return $this->prix_chambre;
        }

        public function setPrixChambre($prix_chambre)
        {
                $this->prix_chambre = $prix_chambre;
        }

        public function getOccupeChambre()
        {
                return $this->occupe_chambre;
        }

        public function setOccupeChambre($occupe_chambre)
        {
                $this->occupe_chambre = $occupe_chambre;
        }

        public function getCategorieChambre()
        {
                return $this->categorie_chambre;
        }

        public function setCategorieChambre($categorie_chambre)
        {
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

        public function getIdClient()
        {
                return $this->id_client;
        }

        public function setIdClient($id_client)
        {
                $this->id_client = $id_client;
        }

        public function getNomClient()
        {
                return $this->nom_client;
        }

        public function setNomClient($nom_client)
        {
                $this->nom_client = $nom_client;

                return $this;
        }

        public function getPrenomClient()
        {
                return $this->prenom_client;
        }

        public function setPrenomClient($prenom_client)
        {
                $this->prenom_client = $prenom_client;

                return $this;
        }


        public function getEmailClient()
        {
                return $this->email_client;
        }


        public function setEmailClient($email_client)
        {
                $this->email_client = $email_client;

                return $this;
        }

        /**
         * Get the value of id_salle
         */ 
        public function getIdSalle()
        {
                return $this->id_salle;
        }

        /**
         * Set the value of id_salle
         *
         * @returnself
         */ 
        public function setIdSalle($id_salle)
        {
                $this->id_salle = $id_salle;

                return $this;
        }

        /**
         * Get the value of name_salle
         */ 
        public function getNameSalle()
        {
                return $this->name_salle;
        }

        /**
         * Set the value of name_salle
         *
         * @returnself
         */ 
        public function setNameSalle($name_salle)
        {
                $this->name_salle = $name_salle;

                return $this;
        }

        /**
         * Get the value of description_salle
         */ 
        public function getDescriptionSalle()
        {
                return $this->description_salle;
        }

        /**
         * Set the value of description_salle
         *
         * @returnself
         */ 
        public function setDescriptionSalle($description_salle)
        {
                $this->description_salle = $description_salle;

                return $this;
        }

        /**
         * Get the value of image_salle
         */ 
        public function getImageSalle()
        {
                return $this->image_salle;
        }

        /**
         * Set the value of image_salle
         *
         * @returnself
         */ 
        public function setImageSalle($image_salle)
        {
                $this->image_salle = $image_salle;

                return $this;
        }

        /**
         * Get the value of type_salle
         */ 
        public function getTypeSalle()
        {
                return $this->type_salle;
        }

        /**
         * Set the value of type_salle
         *
         * @returnself
         */ 
        public function setTypeSalle($type_salle)
        {
                $this->type_salle = $type_salle;

                return $this;
        }

        /**
         * Get the value of options_salle
         */ 
        public function getOptionsSalle()
        {
                return $this->options_salle;
        }

        /**
         * Set the value of options_salle
         *
         * @returnself
         */ 
        public function setOptionsSalle($options_salle)
        {
                $this->options_salle = $options_salle;

                return $this;
        }

       

        public function getIdChambre()
        {
                return $this->id_chambre;
        }

        public function setIdChambre($id_chambre)
        {
                return $this->id_chambre = $id_chambre;
        }

        public function getIdBoisson()
        {
                return $this->id_boisson;
        }

        public function setIdBoisson($id_boisson)
        {
                return $this->id_boisson = $id_boisson;
        }

        public function getNameBoisson()
        {
                return $this->name_boisson;
        }

        public function setNameBoisson($name_boisson)
        {
                return $this->name_boisson = $name_boisson;
        }

        public function getDescriptionBoisson()
        {
                return $this->description_boisson;
        }

        public function setDescriptionBoisson($description_boisson)
        {
                return $this->description_boisson = $description_boisson;
        }

        public function getImageBoisson()
        {
                return $this->image_boisson;
        }

        public function setImageBoisson($image_boisson)
        {
                return $this->image_boisson = $image_boisson;
        }

        public function getPrixBoisson()
        {
                return $this->prix_boisson;
        }

        public function setPrixBoisson($prix_boisson)
        {
                return $this->prix_boisson = $prix_boisson;
        }

        public function getNameRestaurant()
        {
                return $this->name_restaurant;
        }

        public function setNameRestaurant($name_restaurant)
        {
                return $this->name_restaurant = $name_restaurant;
        }

        public function getIdBar()
        {
                return $this->id_bar;
        }

        public function setIdBar($id_bar)
        {
                return $this->id_bar = $id_bar;
        }

        public function getNameBar()
        {
                return $this->name_bar;
        }

        public function setNameBar($name_bar)
        {
                return $this->name_bar = $name_bar;
        }

        public function getIdPiscine()
        {
                return $this->id_piscine;
        }

        public function setIdPiscine($id_piscine)
        {
                return $this->id_piscine = $id_piscine;
        }

        public function getNamePiscine()
        {
                return $this->name_piscine;
        }

        public function setNamePiscine($name_piscine)
        {
                return $this->name_piscine = $name_piscine;
        }

        public function getDescriptionPiscine()
        {
                return $this->description_piscine;
        }

        public function setDescriptionPiscine($description_piscine)
        {
                return $this->description_piscine = $description_piscine;
        }

        public function getImagePiscine()
        {
                return $this->image_piscine;
        }

        public function setImagePiscine($image_piscine)
        {
                return $this->image_piscine = $image_piscine;
        }

        public function getOuverturePiscine()
        {
                return $this->ouverture_piscine;
        }

        public function setOuverturePiscine($ouverture_piscine)
        {
                return $this->ouverture_piscine = $ouverture_piscine;
        }

        public function getFermeturePiscine()
        {
                return $this->fermeture_piscine;
        }

        public function setFermeturePiscine($fermeture_piscine)
        {
                return $this->fermeture_piscine = $fermeture_piscine;
        }

        public function getNettoyagePiscine()
        {
                return $this->nettoyage_piscine;
        }

        public function setNettoyagePiscine($nettoyage_piscine)
        {
                return $this->nettoyage_piscine = $nettoyage_piscine;
        }
}
