<?php
namespace Hotel\Models;

/** Class Salle **/
class Salle {

    private $id_salle; // id de la chambre
    private $name_salle;// nom de la chambre
    private $description_salle; // description de la chambre
    private $image_salle; // image de la chambre
    private $type_salle; // options de la chambre
    private $options_salle; // prix de la chambre

    public function getId() {
        return $this->id_salle;
    }

    public function getName() {
        return $this->name_salle;
    }

    public function getDescription() {
        return $this->description_salle;
    }

    public function getImg() {
        return $this->image_salle;
    }
    
    public function getType(){
        return $this->type_salle;
    }

    public function getOptions(){
        return $this->options_salle;
    }

    public function setId(Int $id) {
        $this->id_salle = $id;
    }

    public function setName(string $nom) {
        $this->name_salle = $nom;
    }

    public function setDescription(string $desc) {
        $this->description_salle = $desc;
    }

    public function setImg(string $mail) {
        $this->image_salle = $mail;
    }

    public function setType(string $type){
        $this->type_salle = $type;
    }

    public function setOptions(string $opt){
        $this->options_salle = $opt;
    }

}
