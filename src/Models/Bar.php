<?php

namespace Hotel\Models;

/** Class Bar **/
class Bar
{

    private $id_bar;
    private $name_bar;

    public function getId()
    {
        return $this->id_bar;
    }

    public function getName()
    {
        return $this->name_bar;
    }

    public function setId(Int $id)
    {
        $this->id_bar = $id;
    }

    public function setName(String $name)
    {
        $this->name_bar = $name;
    }
}
