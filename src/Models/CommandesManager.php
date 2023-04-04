<?php

namespace Phoenix\Models;

use Phoenix\Models\Commandes;

/** Class UserManager **/
class CommandesManager
{

    private $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }
    public function store($uuid,$id_user , $id_destination , $n_personnes , $n_semaines , $prix_total)
    {
        $stmt = $this->bdd->prepare('INSERT INTO commandes (ID_COMMANDES , ID_USER , ID , N_PARTICIPANT , N_SEMAINES , PRIX_TOTAL) VALUE (?,?,?,?,?,?) ');
        $stmt->execute(array(
            $uuid,
            $id_user,
            $id_destination,
            $n_personnes,
            $n_semaines,
            $prix_total
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Phoenix\Models\Commandes");
    }
    public function search($id_commandes,$id_user)
    {
        $stmt = $this->bdd->prepare('SELECT * FROM commandes WHERE ID_COMMANDES = ? AND ID_USER = ?');
        $stmt->execute(array(
            $id_commandes,
            $id_user,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Phoenix\Models\Commandes");
    }

}
