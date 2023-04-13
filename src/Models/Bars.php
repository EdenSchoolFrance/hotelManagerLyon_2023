<?php

namespace Hotel\Models;

/** Class des bars **/
class Bars
{

    private $id_bar;
    private $name_bar;


    public function getid_bar()
    {
        return $this->id_bar;
    }
    public function getname_bar()
    {
        return $this->name_bar;
    }



    public function setid_bar(string $id_bar)
    {
        $this->id_bar = $id_bar;
    }
    public function setname_bar(string $name_bar)
    {
        $this->name_bar = $name_bar;
    }
}
//controller set et get pour tous les bars