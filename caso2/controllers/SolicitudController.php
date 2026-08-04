<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

require_once __DIR__ . '/../models/Solicitud.php';

class SolicitudController
{
    private $solicitudModel;

    public function __construct()
    {
        $this->solicitudModel = new Solicitud();
    }

/* Función para listar todas las solicitudes */
    public function index()
    {
        $solicitudes = $this->solicitudModel->getAll();
        require __DIR__ . '/../views/solicitud/index.php';
    }

/* Función para crear una nueva solicitud */
    public function create()
    {
        require __DIR__ . '/../views/solicitud/create.php';
    }

/* Función para guardar una nueva solicitud */
    public function store()
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /caso2/solicitud');
            exit;
        }

        $data = [
            'nombre'       => trim($_POST['nombre'] ?? ''),
            'email'        => trim($_POST['email'] ?? ''),
            'telefono'     => trim($_POST['telefono'] ?? ''),
            'descripcion'  => trim($_POST['descripcion'] ?? ''),
            'fecha_solicitud' => date('Y-m-d H:i:s'),
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            $solicitud = $data;
            require __DIR__ . '/../views/solicitud/create.php';
            return;
        }

        $this->solicitudModel->insert($data);
        header('Location: /caso2/solicitud');
        exit;
    }

/* Función para mostrar los detalles de una solicitud */
    public function show($id)
    {
        $solicitud = $this->solicitudModel->getById($id);

        if (!$solicitud) {
            header('HTTP/1.0 404 Not Found');
            echo 'Solicitud no encontrada';
            exit;
        }

        require __DIR__ . '/../views/solicitud/show.php';
    }

/* Función para editar una solicitud */
    public function edit($id)
    {
        $solicitud = $this->solicitudModel->getById($id);

        if (!$solicitud) {
            header('Location: /caso2/solicitud');
            exit;
        }

        require __DIR__ . '/../views/solicitud/edit.php';
    }

/* Función para actualizar una solicitud */
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            header('Location: /caso2/solicitud');
            exit;
        }

        $data = [
            'nombre'      => trim($_POST['nombre'] ?? ''),
            'email'       => trim($_POST['email'] ?? ''),
            'telefono'    => trim($_POST['telefono'] ?? ''),
            'descripcion' => trim($_POST['descripcion'] ?? ''),
        ];

        $errors = $this->validate($data);

        if (!empty($errors)) {
            $solicitud = array_merge(['id' => $id], $data);
            require __DIR__ . '/../views/solicitud/edit.php';
            return;
        }

        $this->solicitudModel->update($id, $data);
        header('Location: /caso2/solicitud');
        exit;
    }

/* Función para eliminar una solicitud */
    public function delete($id)
    {
        $this->solicitudModel->delete($id);
        header('Location: /caso2/solicitud');
        exit;
    }

/* Función para validar los datos de la solicitud */
    private function validate(array $data): array
    {
        $errors = [];

        if ($data['nombre'] === '') {
            $errors[] = 'El nombre es obligatorio.';
        }

        if ($data['email'] === '' || !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Debe ingresar un correo válido.';
        }

        if ($data['telefono'] === '') {
            $errors[] = 'El teléfono es obligatorio.';
        }

        if ($data['descripcion'] === '') {
            $errors[] = 'La descripción es obligatoria.';
        }

        return $errors;
    }
}
