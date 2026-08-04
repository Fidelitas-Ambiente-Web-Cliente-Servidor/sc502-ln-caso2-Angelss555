<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

session_start();

require_once "data/datos.php";
if (!isset($_SESSION["id"])) {

    header("Location:index.php");
    exit();
}


$id_taller = $_POST["id_taller"];

$solicitudes[] = [
    "usuario" => $_SESSION["nombre"],
    "taller" => $id_taller,
    "estado" => "Pendiente"
];

echo "<h2>Solicitud enviada correctamente</h2>";
echo "<a href='views/talleres.php'>Volver</a>";

?>