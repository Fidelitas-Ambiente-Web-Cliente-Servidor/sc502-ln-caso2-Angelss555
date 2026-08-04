<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "admin") {

    header("Location: ../index.php");
    exit();

}

require_once "../data/datos.php";

if (!isset($talleres) || !is_array($talleres)) {
    $talleres = [];
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Administrar Talleres</title>
<link rel="stylesheet" href="/caso2/css/estilos.css">

</head>

<body>


<h1>
Gestión de Talleres
</h1>


<p>
Administrador:
<?php echo $_SESSION["nombre"]; ?>
</p>


<hr>


<h2>Talleres registrados</h2>


<table border="1" cellpadding="10">

<tr>

<th>ID</th>
<th>Nombre</th>
<th>Cupo</th>

</tr>

<?php foreach($talleres as $taller){ ?>

<tr>

<td>
<?php echo $taller["id"]; ?>
</td>


<td>
<?php echo $taller["nombre"]; ?>
</td>

<td>
<?php echo $taller["cupo"]; ?>
</td>

</tr>

<?php } ?>

</table>

<br>

<!-- Voover al inicio -->
<a href="administrador.php">
Regresar
</a>

</body>

</html>