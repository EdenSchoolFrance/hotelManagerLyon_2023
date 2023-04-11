<?php

namespace Hotel\Models;

class Menu
{
    private $name_menu;
    private $description_menu;
    private $image_menu;
    private $prix_menu;

    public function getname_menu()
    {
        return $this->name_menu;
    }

    public function getdescription_menu()
    {
        return $this->description_menu;
    }

    public function getimage_menu()
    {
        return $this->image_menu;
    }

    public function getprix_menu()
    {
        return $this->prix_menu;
    }

    public function setname_menu($name_menu)
    {
        $this->name_menu = $name_menu;
    }

    public function setdescription_menu($description_menu)
    {
        $this->description_menu = $description_menu;
    }

    public function setimage_menu($image_menu)
    {
        $this->image_menu = $image_menu;
    }

    public function setprix_menu($prix_menu)
    {
        $this->prix_menu = $prix_menu;
    }
}
