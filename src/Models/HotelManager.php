<?php
namespace Hotel\Models;

use Hotel\Models\Hotel;
class HotelManager
{
    private $manager;
    private $validator;

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function getBdd()
    {
        return $this->bdd;
    }

    public function reservation(){
        $stmt = $this->bdd->prepare("SELECT * FROM chambre WHERE occupe_chambre = 0");
        $stmt->execute(array());
        
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
}