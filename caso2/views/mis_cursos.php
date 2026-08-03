<link rel="stylesheet" href="/caso2/css/estilos.css">
<?php

require_once __DIR__ . "/../data/datos.php";
require_once __DIR__ . "/../data/solicitudes.php";

$usuarioId = $_SESSION["id"];

?>

<h1>Mis cursos inscritos</h1>

<table border="1">

<tr>
    <th>Curso</th>
    <th>Estado</th>
</tr>

<?php

if (isset($solicitudes)) {

    foreach ($solicitudes as $solicitud) {

        if ($solicitud["usuario_id"] == $usuarioId) {

?>

<tr>

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
<?= $solicitud["estado"] ?>
</td>

</tr>

<?php

        }

    }

}

?>

</table>

<br>

<a href="/caso2/index.php">
    Regresar
</a>
