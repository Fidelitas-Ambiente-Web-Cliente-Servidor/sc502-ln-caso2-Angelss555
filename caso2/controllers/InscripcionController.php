<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

session_start();

class InscripcionController
{

/* Función para inscribir a un usuario en un taller */
    public function inscribir($tallerId)
    {

        $archivo = __DIR__ . "/../data/solicitudes.php";

        require $archivo;

        if (!isset($solicitudes)) {
            $solicitudes = [];
        }

/* Si el usuario ya está inscrito en el taller */
        foreach ($solicitudes as $solicitud) {

            if (
                $solicitud["usuario_id"] == $_SESSION["id"] &&
                $solicitud["taller_id"] == $tallerId
            ) {

                return false;

            }

        }

/* Agregar la nueva inscripción */  
        $solicitudes[] = [

            "usuario_id" => $_SESSION["id"],
            "taller_id" => $tallerId,
            "estado" => "pendiente"

        ];

        $contenido = "<?php\n\n";
        $contenido .= '$solicitudes = ';
        $contenido .= var_export($solicitudes, true);
        $contenido .= ";\n";

        file_put_contents($archivo, $contenido);

        return true;

    }

}

$accion = $_GET["accion"] ?? "";

if ($accion == "inscribir") {

    $controller = new InscripcionController();

    $controller->inscribir($_GET["taller"]);

    header("Location: ../index.php?page=mis_cursos");
    exit();

}

?>