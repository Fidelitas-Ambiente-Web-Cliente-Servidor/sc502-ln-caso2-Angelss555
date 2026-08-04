<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

/* Datos de los usuarios */
$usuarios = [

    [
        "id" => 1,
        "nombre" => "Administrador",
        "correo" => "admin@correo.com",
        "password" => password_hash("1234", PASSWORD_DEFAULT),
        "rol" => "admin"
    ],

    [
        "id" => 2,
        "nombre" => "Ángel Rodríguez",
        "correo" => "angel@correo.com",
        "password" => password_hash("1234", PASSWORD_DEFAULT),
        "rol" => "usuario"
    ],

    [
        "id" => 3,
        "nombre" => "María Fernández",
        "correo" => "maria@correo.com",
        "password" => password_hash("1234", PASSWORD_DEFAULT),
        "rol" => "usuario"
    ],

    [
        "id" => 4,
        "nombre" => "Enzo Fernández",
        "correo" => "enzo@correo.com",
        "password" => password_hash("1234", PASSWORD_DEFAULT),
        "rol" => "usuario"
    ],

    [
        "id" => 5,
        "nombre" => "Luna Vargas",
        "correo" => "luna@correo.com",
        "password" => password_hash("1234", PASSWORD_DEFAULT),
        "rol" => "usuario"
    ],

    [
        "id" => 6,
        "nombre" => "Lionel Messi",
        "correo" => "messi@correo.com",
        "password" => password_hash("1234", PASSWORD_DEFAULT),
        "rol" => "usuario"
    ]

];

/* Datos de los talleres */
$talleres = [

    [
        "id" => 1,
        "nombre" => "Angular",
        "cupo" => 3
    ],

    [
        "id" => 2,
        "nombre" => "PHP",
        "cupo" => 2
    ],

    [
        "id" => 3,
        "nombre" => "Laravel",
        "cupo" => 1
    ],

    [
        "id" => 4,
        "nombre" => "Java",
        "cupo" => 5
    ],

    [
        "id" => 5,
        "nombre" => "Python",
        "cupo" => 4
    ],

    [
        "id" => 6,
        "nombre" => "JavaScript",
        "cupo" => 6
    ],

    [
        "id" => 7,
        "nombre" => "React",
        "cupo" => 2
    ],

    [
        "id" => 8,
        "nombre" => "Node.js",
        "cupo" => 3
    ],

    [
        "id" => 9,
        "nombre" => "MySQL",
        "cupo" => 4
    ],

    [
        "id" => 10,
        "nombre" => "Ciberseguridad",
        "cupo" => 2
    ],

    [
        "id" => 11,
        "nombre" => "Docker",
        "cupo" => 3
    ],

    [
        "id" => 12,
        "nombre" => "Git y GitHub",
        "cupo" => 5
    ]

];

/* Datos de las solicitudes */
$solicitudes = [

    [
        "id" => 1,
        "usuario_id" => 2,
        "taller_id" => 1,
        "estado" => "pendiente"
    ],

    [
        "id" => 2,
        "usuario_id" => 3,
        "taller_id" => 2,
        "estado" => "aprobada"
    ],

    [
        "id" => 3,
        "usuario_id" => 4,
        "taller_id" => 3,
        "estado" => "rechazada"
    ],

    [
        "id" => 4,
        "usuario_id" => 5,
        "taller_id" => 5,
        "estado" => "pendiente"
    ],

    [
        "id" => 5,
        "usuario_id" => 6,
        "taller_id" => 8,
        "estado" => "aprobada"
    ]

];