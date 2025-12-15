<?php

class ConexionTaller extends PDO {

    private string $host = "localhost";
    private string $usu = "dwes";
    private string $pass = "abc123.";
    private string $bd = "taller_mecanico";

    public function __construct() {

        $dsn = "mysql:host={$this->host};dbname={$this->bd};charset=utf8mb4";

        try {
            parent::__construct(
                    $dsn,
                    $this->usu,
                    $this->pass,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
            );
        } catch (PDOException $e) {
            die("Error de conexión: " . $e->getMessage());
        }
    }

    public function __get(string $name): mixed {
        return $this->$name;
    }

    public function __set(string $name, mixed $value): void {
        $this->$name = $value;
    }
}
