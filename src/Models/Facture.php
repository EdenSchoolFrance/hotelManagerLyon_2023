<?php
namespace hotel\Models;

/** Class Facture **/
class Facture {

    private $id_facture;
    private $num_reference;
    private $date_facture;
    private $total_ttc;


    public function getId_facture()
    {
        return $this->id_facture;
    }

    public function getNum_reference()
    {
        return $this->num_reference;
    }

    public function getDate_facture()
    {
        return $this->date_facture;
    }

    public function getTotal_ttc()
    {
        return $this->total_ttc;
    }

    public function setId_facture($id_facture)
    {
        $this->id_facture = $id_facture;

        return $this;
    }

    public function setNum_reference($num_reference)
    {
        $this->num_reference = $num_reference;

        return $this;
    }

    public function setDate_facture($date_facture)
    {
        $this->date_facture = $date_facture;

        return $this;
    }

    public function setTotal_ttc($total_ttc)
    {
        $this->total_ttc = $total_ttc;

        return $this;
    }
}