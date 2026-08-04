<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

class Taller
{

    private $talleres;

/* Constructor de la clase Taller */
    public function __construct()
    {
        require __DIR__ . "/../data/datos.php";
        $this->talleres = $talleres;
    }

/* Función para obtener los talleres */
    public function obtenerTalleres()
    {
        return $this->talleres;
    }
}

?>