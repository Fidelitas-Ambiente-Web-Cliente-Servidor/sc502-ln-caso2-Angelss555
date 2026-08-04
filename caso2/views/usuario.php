<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>

<meta charset="UTF-8">

<title>Panel de Usuario</title>

<link rel="stylesheet" href="/caso2/css/estilos.css">

</head>

<body>

<header>

<h1>
Bienvenido 
<?= $_SESSION["nombre"] ?? "Usuario"; ?>
</h1>

</header>

<nav>
<h3>Menú de usuario</h3>

<a href="/caso2/index.php?page=cursos">
    Ver cursos disponibles
</a>

<a href="/caso2/index.php?page=mis_cursos">
    Mis cursos inscritos
</a>

<a href="/caso2/logout.php">
    Cerrar sesión
</a>

</nav>
<section>
<h2>Panel de Usuario</h2>
<p>
Desde aquí puede ver los cursos disponibles e inscribirse.
</p>

</section>
</body>
</html>