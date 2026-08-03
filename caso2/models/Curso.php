<?php

require_once __DIR__ . "/../data/datos.php";

class Curso
{

    public static function obtenerCursos()
    {
        global $talleres;

        return $talleres;
    }


    public static function cursosDisponibles()
    {
        global $talleres, $solicitudes;

        foreach ($talleres as &$curso) {

            $inscritos = 0;

            foreach ($solicitudes as $solicitud) {

                if ($solicitud["curso_id"] == $curso["id"]) {
                    $inscritos++;
                }

            }

            $curso["disponibles"] = $curso["cupo"] - $inscritos;
        }


        return $talleres;
    }

}