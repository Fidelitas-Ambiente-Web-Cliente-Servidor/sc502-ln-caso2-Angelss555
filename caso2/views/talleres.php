<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


require_once __DIR__ . "/../data/datos.php";

if (!isset($talleres)) {
    $talleres = [];
}

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "usuario") {

    header("Location: ../index.php");
    exit();

}

?>

<!DOCTYPE html>
<html>

<head>
<title>Talleres</title>
</head>

<body>

<h1>
Talleres disponibles
</h1>
<p>
Usuario:
<?php echo $_SESSION["nombre"]; ?>
</p>

<hr>

<?php foreach($talleres as $taller){ ?>

<h3>
<?php echo $taller["nombre"]; ?>
</h3>

<p>
Cupo disponible:
<?php echo $taller["cupo"]; ?>
</p>

<form action="../solicitar.php" method="POST">

<input 
type="hidden"
name="id_taller"
value="<?php echo $taller["id"]; ?>"
>

<button type="submit">
Solicitar inscripción
</button>

</form>

<hr>

<?php } ?>

<a href="usuario.php">
Regresar
</a>

</body>

</html>