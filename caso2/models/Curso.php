<?php
/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

require_once __DIR__ . "/../data/datos.php";

class Curso
{

/* Función para obtener los cursos */
    public static function obtenerCursos()
    {
        global $talleres;
        return $talleres;
    }

/* Función para obtener los cursos disponibles */
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