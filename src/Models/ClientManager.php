<?php

namespace Hotel\Models;

use Hotel\Models\Client;

/** Class UserManager **/
class ClientManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }


    public function getAllClients()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client ORDER BY nom_client');
        $stmt->execute();
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function showClientSpecific($slug)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM client WHERE id_client = ?');
        $stmt->execute(array(
            $slug,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Client");
        return $stmt->fetch();

        // return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function getAllFiltred($slug)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM destination LEFT JOIN contient ON contient.ID = destination.ID LEFT JOIN filtre ON filtre.ID_FILTRE = contient.ID_FILTRE WHERE filtre.NOM_FILTRE = ?');
        $stmt->execute(array(
            $slug,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Voyage");
    }
}
