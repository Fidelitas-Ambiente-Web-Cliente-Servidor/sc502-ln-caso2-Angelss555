<?php

/*
Hecho por Ángel Felipe Rodríguez Vargas
*/

class Solicitud
{
    private $pdo;
    public function __construct()
    {
        $host = '127.0.0.1';
        $db   = 'caso2';
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';
        $dsn = "mysql:host={$host};dbname={$db};charset={$charset}";
        $options = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false,
        ];

        $this->pdo = new PDO($dsn, $user, $pass, $options);
    }

/* Función para obtener todas las solicitudes */
    public function getAll(): array
    {
        $stmt = $this->pdo->query('SELECT * FROM solicitudes ORDER BY fecha_solicitud DESC');
        return $stmt->fetchAll();
    }

/* Función para obtener una solicitud por su ID */
    public function getById(int $id): ?array
    {
        $stmt = $this->pdo->prepare('SELECT * FROM solicitudes WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

/* Función para hacer una nueva solicitud */
    public function insert(array $data): bool
    {
        $stmt = $this->pdo->prepare(
            'INSERT INTO solicitudes (nombre, email, telefono, descripcion, fecha_solicitud)
             VALUES (:nombre, :email, :telefono, :descripcion, :fecha_solicitud)'
        );
        return $stmt->execute([
            ':nombre'         => $data['nombre'],
            ':email'          => $data['email'],
            ':telefono'       => $data['telefono'],
            ':descripcion'    => $data['descripcion'],
            ':fecha_solicitud'=> $data['fecha_solicitud'],
        ]);
    }

/* Función para actualizar una solicitud existente */
    public function update(int $id, array $data): bool
    {
        $stmt = $this->pdo->prepare(
            'UPDATE solicitudes
             SET nombre = :nombre,
                 email = :email,
                 telefono = :telefono,
                 descripcion = :descripcion
             WHERE id = :id'
        );

        return $stmt->execute([
            ':nombre'      => $data['nombre'],
            ':email'       => $data['email'],
            ':telefono'    => $data['telefono'],
            ':descripcion' => $data['descripcion'],
            ':id'          => $id,
        ]);
    }

/* Función para eliminar una solicitud */
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare('DELETE FROM solicitudes WHERE id = ?');
        return $stmt->execute([$id]);
    }
}