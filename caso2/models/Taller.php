<?php

class Taller
{

    private $talleres;


    public function __construct()
    {

        require __DIR__ . "/../data/datos.php";

        $this->talleres = $talleres;

    }


    public function obtenerTalleres()
    {

        return $this->talleres;

    }


}

?>