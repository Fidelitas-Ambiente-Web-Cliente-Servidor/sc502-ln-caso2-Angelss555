<?php

require_once __DIR__ . "/../models/Usuario.php";


class AuthController
{


    public function login($correo, $password)
    {


        $usuarioModel = new Usuario();


        $usuario = $usuarioModel->validarLogin(
            $correo,
            $password
        );


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