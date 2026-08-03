<?php

require_once "../models/Curso.php";


$accion = $_GET["accion"] ?? "";


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