<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

require_once "../models/Curso.php";


$accion = $_GET["accion"] ?? "";

/* Manejo de acciones para el controlador de cursos */
switch($accion){
    case "listar":
        echo json_encode(
            Curso::cursosDisponibles()
        );
    break;

    default:
        echo json_encode([
            "ok"=>false,
            "mensaje"=>"Acción no válida"
        ]);

}