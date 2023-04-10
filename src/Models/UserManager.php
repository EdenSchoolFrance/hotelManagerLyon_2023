<?php

namespace Hotel\Models;

/** Class UserManager **/
class UserManager extends BDD
{

    public function find($username)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM User WHERE username = ?");
        $stmt->execute(array(
            $username
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\User");

        return $stmt->fetch();
    }

    public function all()
    {
        $stmt = $this->bdd->query('SELECT * FROM User');

        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\User");
    }

    public function store($password)
    {
        $stmt = $this->bdd->prepare("INSERT INTO User(username, password) VALUES (?, ?)");
        $stmt->execute(array(
            $_POST["username"],
            $password
        ));
    }
}
