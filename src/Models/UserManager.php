<?php
namespace Hotel\Models;

use Hotel\Models\Users;
class UserManager
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

    public function findUser($username)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM users WHERE Nom_user = ?");
        $stmt->execute(array(
            $username,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Users");
        return $stmt->fetch();
    }

    public function findIdUser($username)
    {
        $stmt = $this->bdd->prepare("SELECT Id_user FROM users WHERE Nom_user = ?");
        $stmt->execute(array(
            $username,
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS, "Hotel\Models\Users");
        return $stmt->fetch();
    }
    public function storeUser($password)
    {
        $stmt = $this->bdd->prepare("INSERT INTO users VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute(array(
            uniqid(),
            htmlentities($_POST['username']),
            htmlentities($_POST['email']),
            htmlentities($password),
            date('Y-m-d H:i:s'),
            0,
            0,
        ));
    }
    
}