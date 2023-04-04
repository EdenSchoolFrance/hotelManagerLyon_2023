<?php
namespace Hotel\Models;

/** Class Chambre **/
class Chambre {

    private $id_chambre; // id de la chambre
    private $name_chambre;// nom de la chambre
    private $description_chambre; // description de la chambre
    private $image_chambre; // image de la chambre
    private $options_chambre; // options de la chambre
    private $prix_chambre; // prix de la chambre
    private $occupe_chambre; // occupation de la chambre
    private $categorie_chambre; // categorie chambre

    public function getId() {
        return $this->id_chambre;
    }

    public function getName() {
        return $this->name_chambre;
    }

    public function getDescription() {
        return $this->description_chambre;
    }

    public function getImg() {
        return $this->image_chambre;
    }
    
    public function getOptions(){
        return $this->options_chambre;
    }

    public function getPrix(){
        return $this->prix_chambre;
    }

    public function getOccupe(){
        return $this->occupe_chambre;
    }

    public function getCategorie(){
        return $this->categorie_chambre;
    }

    public function setId(Int $id) {
        $this->id_chambre = $id;
    }

    public function setName(string $nom) {
        $this->name_chambre = $nom;
    }

    public function setDescription(string $desc) {
        $this->description_chambre = $desc;
    }

    public function setImg(string $mail) {
        $this->image_chambre = $mail;
    }

    public function setOptions(string $i){
        $this->options_chambre = $i;
    }

    public function setPrix(string $i){
        $this->prix_chambre = $i;
    }

    public function setOccupe(string $i){
        $this->occupe_chambre = $i;
    }

    public function setCategorie(string $i){
        $this->categorie_chambre = $i;
    }

}
