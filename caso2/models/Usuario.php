<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

class Usuario
{

    private $usuarios;
    public function __construct()
    {
        require __DIR__ . "/../data/datos.php";
        $this->usuarios = $usuarios;
    }

/* Función para obtener los usuarios */
    public function validarLogin($correo, $password)
    {
        foreach($this->usuarios as $usuario){
            if(
                $usuario["correo"] == $correo &&
                password_verify(
                    $password,
                    $usuario["password"]
                )
            ){
                return $usuario;
            }
        }
        return null;
    }
}

?>