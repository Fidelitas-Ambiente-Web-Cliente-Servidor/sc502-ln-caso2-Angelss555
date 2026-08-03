<?php

$archivo = __DIR__ . "/../data/solicitudes.php";

require $archivo;

$accion = $_GET["accion"] ?? "";
$id = $_GET["id"] ?? "";

if (isset($solicitudes[$id])) {

    // Solo procesar solicitudes pendientes
    if ($solicitudes[$id]["estado"] == "pendiente") {

        if ($accion == "aprobar") {

            $solicitudes[$id]["estado"] = "aprobado";

        } elseif ($accion == "rechazar") {

            $solicitudes[$id]["estado"] = "rechazado";

        }

        $contenido = "<?php\n\n";
        $contenido .= '$solicitudes = ';
        $contenido .= var_export($solicitudes, true);
        $contenido .= ";\n";

        file_put_contents($archivo, $contenido);

    }

}

header("Location: ../index.php?page=solicitudes");
exit();