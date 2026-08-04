/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

document
.getElementById("frmLogin")
.addEventListener("submit", function(e){

/* Función para inciar sesión */
    e.preventDefault();
    let correo = document.getElementById("correo").value;
    let password = document.getElementById("password").value;

    fetch("login.php", {
        method:"POST",
        headers:{
            "Content-Type":"application/json"
        },
        body: JSON.stringify({
            correo:correo,
            password:password

        })

    })

/* Función para que el sistema sepa si es administrador o usuario */
    .then(response => response.json())
    .then(data => {
        let mensaje = document.getElementById("mensaje");
        if(data.estado){
            if(data.rol=="admin"){
                window.location.href =
                "views/administrador.php";
            }else{
                window.location.href =
                "views/usuario.php";

            }
        }else{
            mensaje.innerHTML = data.mensaje;

        }
    });
});