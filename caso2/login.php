<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

require_once __DIR__ . "/controllers/AuthController.php";

/* Obtener los datos por POST */
$datos = json_decode(
    file_get_contents("php://input"),
    true
);

$correo = $datos["correo"];
$password = $datos["password"];
$auth = new AuthController();

header("Content-Type: application/json");

echo json_encode(
    $auth->login(
        $correo,
        $password
    )
);

?>