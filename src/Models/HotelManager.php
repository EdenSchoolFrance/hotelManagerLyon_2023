<?php

namespace Hotel\Models;

use Hotel\Models\Hotel;

/** Class UserManager **/
class HotelManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function getAll()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM ');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Hotel");
    }
    
}
