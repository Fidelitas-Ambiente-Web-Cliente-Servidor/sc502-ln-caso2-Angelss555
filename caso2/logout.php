<?php
/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

session_start();
session_destroy();
header("Location: index.php");

/* Redirigir al usuario al login */
exit();

?>