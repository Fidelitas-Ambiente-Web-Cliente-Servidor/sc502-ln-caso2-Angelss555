<?php

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

    public function index()
    {
        $talleres = $this->callModelMethod('getAll');
        require_once __DIR__ . '/../views/taller/index.php';
    }

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

    public function show($id)
    {
        $taller = $this->findTaller($id);
        require_once __DIR__ . '/../views/taller/show.php';
    }

    public function create()
    {
        require_once __DIR__ . '/../views/taller/create.php';
    }

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

    public function edit($id)
    {
        $taller = $this->findTaller($id);
        require_once __DIR__ . '/../views/taller/edit.php';
    }

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

    public function delete($id)
    {
        $this->callModelMethod('delete', [$id]);
        header('Location: /caso2/taller');
        exit;
    }
}
