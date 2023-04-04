<?php
namespace Hotel\Models;

use Hotel\Models\Hotel;
/** Class UserHotel **/
class HotelManager {

    private $bdd;

    public function __construct() {
        $this->bdd = new \PDO('mysql:host='.HOST.';dbname=' . DATABASE . ';charset=utf8;' , USER, PASSWORD);
        $this->bdd->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
    }

    public function find($name, $userId)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM List WHERE name = ? AND user_id = ?");
        $stmt->execute(array(
            $name,
            $userId
        ));
        $stmt->setFetchMode(\PDO::FETCH_CLASS,"Hotel\Models\Hotel");

        return $stmt->fetch();
    }

    public function store() {
        $stmt = $this->bdd->prepare("INSERT INTO List(name, user_id) VALUES (?, ?)");
        $stmt->execute(array(
            $_POST["name"],
            $_SESSION["user"]["id"]
        ));
    }

    public function update($slug) {
        $stmt = $this->bdd->prepare("UPDATE List SET name = ? WHERE name = ? AND user_id = ?");
        $stmt->execute(array(
            $_POST['nameHotel'],
            $slug,
            $_SESSION["user"]["id"]
        ));
    }

    public function delete($slug) {

        $stmt = $this->bdd->prepare("DELETE FROM List WHERE id = ? AND user_id = ?");
        $stmt->execute(array(
            $_POST["idList"],
            $_SESSION["user"]["id"]
        ));
    }

    public function getAll()
    {
        $stmt = $this->bdd->prepare('SELECT * FROM List WHERE user_id = ?');
        $stmt->execute(array(
            $_SESSION["user"]["id"]
        ));

        return $stmt->fetchAll(\PDO::FETCH_CLASS,"Hotel\Models\Hotel");
    }
}
