<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

require_once __DIR__ . "/../models/Usuario.php";


class AuthController
{

/* Función para manejar el inicio de sesión */
    public function login($correo, $password)
    {
        $usuarioModel = new Usuario();
        $usuario = $usuarioModel->validarLogin(
            $correo,
            $password
        );

    /* Si el usuario es válido, iniciar sesión y con su rol */
        if($usuario){

            session_start();
            $_SESSION["id"] = $usuario["id"];
            $_SESSION["nombre"] = $usuario["nombre"];
            $_SESSION["rol"] = $usuario["rol"];

            return [
                "estado" => true,
                "rol" => $usuario["rol"]
            ];
        }

        return [
            "estado" => false,
            "mensaje" => "Correo o contraseña incorrectos"
        ];
    }
}

?>