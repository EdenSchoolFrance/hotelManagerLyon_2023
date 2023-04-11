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

    public function getAllChambres()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM chambre');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Chambre");
    }

    public function getChambre($id)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM chambre WHERE id_chambre = ?");
        $stmt->execute(array(
            $id
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Chambre");
        return $stmt->fetch();
    }
}
