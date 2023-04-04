<?php

namespace Hotel\Models;

class Users
{
    private $Id_user;
    private $Nom_user;
    private $Email_user;
    private $Password_user;
    private $Date_user;
    private $Order_user;
    private $Role_user;

    public function getIdUser()
    {
        return $this->Id_user;
    }

    public function setIdUser($Id_user)
    {
        $this->Id_user = $Id_user;
    }

    public function getNomUser()
    {
        return $this->Nom_user;
    }

    public function setNomUser($Nom_user)
    {
        $this->Nom_user = $Nom_user;
    }

    public function getEmailUser()
    {
        return $this->Email_user;
    }

    public function setEmailUser($Email_user)
    {
        $this->Email_user = $Email_user;
    }

    public function getPassword_user()
    {
        return $this->Password_user;
    }

    public function setPassword_user($Password_user)
    {
        $this->Password_user = $Password_user;
    }

    public function getDate_user()
    {
        return $this->Date_user;
    }

    public function setDate_user($Date_user)
    {
        $this->Date_user = $Date_user;
    }

    public function getOrder_user()
    {
        return $this->Order_user;
    }

    public function setOrderUser($Order_user)
    {
        $this->Order_user = $Order_user;
    }

    public function getRoleUser()
    {
        return $this->Role_user;
    }

    public function setRoleUser($Role_user)
    {
        $this->Role_user = $Role_user;
    }
}