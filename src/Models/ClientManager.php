<?php

namespace Hotel\Models;

use Hotel\Models\Client;
use Hotel\Models\Bdd;

/** Class UserManager **/
class ClientManager extends Bdd
{

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
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function find($prenom, $nom, $email)
    {
        $stmt = $this->bdd->prepare("SELECT * FROM client WHERE prenom_client = ? AND nom_client = ? AND email_client = ?");
        $stmt->execute(array(
            $prenom,
            $nom,
            $email
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function CreateClient($prenom, $nom, $email)
    {
        $stmt = $this->bdd->prepare('INSERT INTO `client` (`nom_client` , `prenom_client`, `email_client`) VALUE (?,?,?) ');
        $stmt->execute(array(
            $nom,
            $prenom,
            $email,

        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function delete_Client($id, $nom, $prenom, $email)
    {
        $stmt = $this->bdd->prepare('DELETE FROM `client` WHERE id_client = ? AND prenom_client = ? AND nom_client = ? AND email_client = ?');
        $stmt->execute(array(
            $id,
            $nom,
            $prenom,
            $email,

        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Client");
    }

    public function reserve_chambres($user, $id_chambre, $deb_date, $fin_date, $num_reserve)
    {
        $stmt = $this->bdd->prepare('INSERT INTO `client_chambre`(`id_client`, `id_chambre`, `date_debut_reservation_chambre`, `date_fin_reservation_piscine_chambre`, `num_reservation_chambre`) VALUES (?,?,?,?,?)');
        $stmt->execute(array(
            $user,
            $id_chambre,
            $deb_date,
            $fin_date,
            $num_reserve,
        ));

        $stmt = $this->bdd->prepare('UPDATE `chambre` SET `occupe_chambre`= :occupe WHERE `id_chambre` = :id_chambre');
        $stmt->execute(array(
            'occupe' => 1,
            ':id_chambre' => $id_chambre,
        ));
        return;
    }

    public function reserve_piscines($user, $id_piscine, $deb_date, $fin_date, $num_reserve)
    {
        $stmt = $this->bdd->prepare('INSERT INTO `client_piscine`(`id_piscine`, `id_client`, `date_debut_reservation_piscine`, `date_fin_reservation_piscine`, `num_reservation_piscine`) VALUES (?,?,?,?,?)');
        $stmt->execute(array(
            $id_piscine,
            $user,
            $deb_date,
            $fin_date,
            $num_reserve,
        ));
        return;
    }

    public function reserve_salles($user, $id_salle, $deb_date, $fin_date, $num_reserve)
    {
        $stmt = $this->bdd->prepare('INSERT INTO `client_salle`(`id_client`, `id_salle`, `date_debut_reservation_salle`, `date_fin_reservation_salle`, `num_reservation_salle`) VALUES (?,?,?,?,?)');
        $stmt->execute(array(
            $user,
            $id_salle,
            $deb_date,
            $fin_date,
            $num_reserve,
        ));
        return;
    }

    public function find_reserve_menus($user)
    {
        $stmt = $this->bdd->prepare("SELECT quantite_client_menu FROM client_menu WHERE `id_client` = :user");
        $stmt->execute(array(
            'user' => $user,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Menus");
    }

    public function reserve_menus($user, $id_menu, $quantite, $date)
    {
        $stmt = $this->bdd->prepare('INSERT INTO `client_menu`(`id_client`, `id_menu`, `quantite_client_menu`, `date_client_menu`) VALUES (?,?,?,?)');
        $stmt->execute(array(
            $user,
            $id_menu,
            $quantite,
            $date,
        ));
        return;
    }

    public function update_reserve_menus($user, $quantite)
    {
        $stmt = $this->bdd->prepare('UPDATE `client_menu` SET `quantite_client_menu`= :quantite WHERE `id_client` = :user');
        $stmt->execute(array(
            'quantite' => $quantite,
            'user' => $user,
        ));
        return;
    }

    public function find_reserve_boissons($user)
    {
        $stmt = $this->bdd->prepare("SELECT quantite_client_boisson FROM client_boisson WHERE `id_client` = :user");
        $stmt->execute(array(
            'user' => $user,
        ));
        return $stmt->fetchAll(\PDO::FETCH_CLASS, "Hotel\Models\Boissons");
    }

    public function reserve_boissons($user, $id_boisson, $quantite, $date)
    {
        $stmt = $this->bdd->prepare('INSERT INTO `client_boisson`(`id_client`, `id_boisson`, `quantite_client_boisson`, `date_client_boisson`) VALUES (?,?,?,?)');
        $stmt->execute(array(
            $user,
            $id_boisson,
            $quantite,
            $date,
        ));
        return;
    }

    public function update_reserve_boissons($user, $quantite)
    {
        $stmt = $this->bdd->prepare('UPDATE `client_boisson` SET `quantite_client_boisson`= :quantite WHERE `id_client` = :user');
        $stmt->execute(array(
            'quantite' => $quantite,
            'user' => $user,
        ));
        return;
    }
}
