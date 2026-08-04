<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

require_once __DIR__ . '/../models/Taller.php';

class TallerController
{
    protected $model;

    public function __construct()
    {
        $this->model = new Taller();
    }

    protected function callModelMethod(string $method, array $params = [])
    {
        if (!method_exists($this->model, $method)) {
            throw new \BadMethodCallException("Method {$method} does not exist on model " . get_class($this->model));
        }

        return $this->model->{$method}(...$params);
    }

 /* Función para listar todos los talleres */
    public function index()
    {
        $talleres = $this->callModelMethod('getAll');
        require_once __DIR__ . '/../views/taller/index.php';
    }

/* Función para encontrar un taller por su ID */
    protected function findTaller($id)
    {
        $talleres = $this->callModelMethod('getAll');
        foreach ($talleres as $taller) {
            if ((is_array($taller) && isset($taller['id']) && $taller['id'] == $id) ||
                (is_object($taller) && isset($taller->id) && $taller->id == $id)) {
                return $taller;
            }
        }

        return null;
    }

/* Función para ver los detalles de un taller */
    public function show($id)
    {
        $taller = $this->findTaller($id);
        require_once __DIR__ . '/../views/taller/show.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/taller/create.php';
    }

/* Función para guardar un nuevo taller */
    public function store(array $data)
    {
        $this->callModelMethod('insert', [
            [
                'titulo' => $data['titulo'] ?? '',
                'descripcion' => $data['descripcion'] ?? '',
                'fecha' => $data['fecha'] ?? null,
            ],
        ]);

        header('Location: /caso2/taller');
        exit;
    }

/* Función para editar un taller */
    public function edit($id)
    {
        $taller = $this->findTaller($id);
        require_once __DIR__ . '/../views/taller/edit.php';
    }

/* Función para actualizar un taller */
    public function update($id, array $data)
    {
        $this->callModelMethod('update', [$id, [
            'titulo' => $data['titulo'] ?? '',
            'descripcion' => $data['descripcion'] ?? '',
            'fecha' => $data['fecha'] ?? null,
        ]]);

        header('Location: /caso2/taller');
        exit;
    }

/* Función para eliminar un taller */
    public function delete($id)
    {
        $this->callModelMethod('delete', [$id]);
        header('Location: /caso2/taller');
        exit;
    }
}
