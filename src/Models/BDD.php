<?php

namespace Hotel\Models;

class BDD
{
    protected $bdd;

    public function __construct()
    {
        $this->bdd = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE . ';charset=utf8;', USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $this->bdd;
    }

    /* public static function getInstance()
    {
        if (self::$instance === null) {
            new BDD();
        }

        return self::$instance;
    } */
}
