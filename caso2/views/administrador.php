<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION["rol"]) || $_SESSION["rol"] != "admin") {

    header("Location: /caso2/index.php");
    exit();

}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Panel Administrador</title>

<link rel="stylesheet" href="/caso2/css/estilos.css">

</head>


<body>

<header>

<h1>Panel de Administrador</h1>

<p>
Usuario:
<?= $_SESSION["nombre"]; ?>
</p>

</header>


<nav>

<h3>Menú</h3>


<a href="/caso2/views/talleres_admin.php">
    Gestionar talleres
</a>


<a href="/caso2/index.php?page=solicitudes">
    Ver solicitudes
</a>


<a href="/caso2/logout.php">
    Cerrar sesión
</a>


</nav>


<section>

<h2>Bienvenido al sistema</h2>

<p>
Desde este panel puede administrar las opciones del sistema.
</p>

</section>

</body>

</html>