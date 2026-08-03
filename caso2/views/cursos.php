<link rel="stylesheet" href="/caso2/css/estilos.css">
<?php

require_once __DIR__ . "/../models/Taller.php";
require_once __DIR__ . "/../data/solicitudes.php";

$tallerModel = new Taller();
$talleres = $tallerModel->obtenerTalleres();

?>

<h1>Cursos disponibles</h1>

<table border="1">

<tr>
    <th>Curso</th>
    <th>Cupos disponibles</th>
    <th>Acción</th>
</tr>

<?php foreach($talleres as $taller){ ?>

<?php

$cuposDisponibles = $taller["cupo"];

// Restar únicamente las solicitudes aprobadas
foreach($solicitudes as $solicitud){

    if(
        $solicitud["taller_id"] == $taller["id"] &&
        $solicitud["estado"] == "aprobado"
    ){
        $cuposDisponibles--;
    }

}

?>

<tr>

<td>
<?= $taller["nombre"] ?>
</td>

<td>
<?= $cuposDisponibles ?>
</td>

<td>

<?php if($cuposDisponibles > 0){ ?>

    <a href="/caso2/controllers/InscripcionController.php?accion=inscribir&taller=<?= $taller["id"] ?>">
        Inscribirse
    </a>

<?php }else{ ?>

    <strong>Sin cupos</strong>

<?php } ?>

</td>

</tr>

<?php } ?>

</table>

<br>

<a href="index.php">
    Regresar
</a>