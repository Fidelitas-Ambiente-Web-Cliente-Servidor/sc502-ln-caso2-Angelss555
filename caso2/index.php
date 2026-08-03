<?php

session_start();

if (isset($_SESSION["rol"])) {

    if (isset($_GET["page"])) {

        switch ($_GET["page"]) {

            case "cursos":
                include "views/cursos.php";
                break;

            case "mis_cursos":
                include "views/mis_cursos.php";
                break;

            case "solicitudes":
                include "views/solicitudes.php";
                break;

            case "talleres":
                include "views/talleres_admin.php";
                break;

            default:

                if ($_SESSION["rol"] == "admin") {
                    include "views/administrador.php";
                } else {
                    include "views/usuario.php";
                }

                break;
        }

    } else {

        if ($_SESSION["rol"] == "admin") {
            include "views/administrador.php";
        } else {
            include "views/usuario.php";
        }

    }

} else {

?>

<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="UTF-8">

    <title>Sistema de Inscripción a Talleres</title>

    <link rel="stylesheet" href="/caso2/css/estilos.css">

</head>

<body>

    <h1>Sistema de Inscripción a Talleres</h1>

    <form id="frmLogin">

        <label>Correo</label>
        <br>

        <input type="email" id="correo" required>

        <br><br>

        <label>Contraseña</label>
        <br>

        <input type="password" id="password" required>

        <br><br>

        <button type="submit">
            Ingresar
        </button>

    </form>

    <div id="mensaje"></div>

    <script src="/caso2/js/login.js"></script>

</body>

<footer>
    <h4>
        &copy; 2026 Sistema de Inscripción | Angel Felipe Rodríguez Vargas.
    </h4>
</footer>

</html>

<?php

}

?>