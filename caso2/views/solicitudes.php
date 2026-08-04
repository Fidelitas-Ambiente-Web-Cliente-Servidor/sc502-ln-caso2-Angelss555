<link rel="stylesheet" href="/caso2/css/estilos.css">
<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

require_once __DIR__ . "/../data/datos.php";
require_once __DIR__ . "/../data/solicitudes.php";

?>

<h1>Solicitudes de inscripción</h1>

<table border="1">

<tr>
    <th>Usuario</th>
    <th>Taller</th>
    <th>Estado</th>
    <th>Acción</th>
</tr>

<?php

if (isset($solicitudes)) {

    foreach ($solicitudes as $indice => $solicitud) {

?>

<tr>

<td>

<?php

foreach ($usuarios as $usuario) {

    if ($usuario["id"] == $solicitud["usuario_id"]) {

        echo $usuario["nombre"];
        break;

    }

}

?>

</td>

<td>

<?php

foreach ($talleres as $taller) {

    if ($taller["id"] == $solicitud["taller_id"]) {

        echo $taller["nombre"];
        break;

    }

}

?>

</td>

<td>

<?= ucfirst($solicitud["estado"]) ?>

</td>

<td>

<?php if ($solicitud["estado"] == "pendiente") { ?>

    <a href="/caso2/controllers/AdministracionController.php?accion=aprobar&id=<?= $indice ?>">
        Aprobar
    </a>

    |

    <a href="/caso2/controllers/AdministracionController.php?accion=rechazar&id=<?= $indice ?>">
        Rechazar
    </a>

<?php } else { ?>

    Procesada

<?php } ?>

</td>

</tr>

<?php

    }

}

?>

</table>

<br>

<a href="/caso2/index.php">
    Regresar
</a>