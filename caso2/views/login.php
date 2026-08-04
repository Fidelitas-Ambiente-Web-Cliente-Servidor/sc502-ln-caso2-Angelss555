<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

/* Verificar si el usuario ya ha iniciado sesión */
require_once __DIR__ . "/../data/datos.php";
if (!isset($usuarios) || !is_array($usuarios)) {
    $usuarios = [];
}

$datos = json_decode(
    file_get_contents("php://input"),
    true
);

$correo = $datos["correo"];
$password = $datos["password"];

$usuarioEncontrado = null;

foreach($usuarios as $usuario){

    if(
        $usuario["correo"] == $correo &&
        password_verify(
            $password,
            $usuario["password"]
        )
    ){
        $usuarioEncontrado = $usuario;
        break;
    }
}


header("Content-Type: application/json");

/* Si se encontró un usuario se inicia sesión*/
if($usuarioEncontrado){
    $_SESSION["id"] = $usuarioEncontrado["id"];
    $_SESSION["nombre"] = $usuarioEncontrado["nombre"];
    $_SESSION["rol"] = $usuarioEncontrado["rol"];

    echo json_encode([
        "estado" => true,
        "rol" => $usuarioEncontrado["rol"]
    ]);

}else{

    echo json_encode([
        "estado" => false,
        "mensaje" => "Correo o contraseña incorrectos"
    ]);
}
?>