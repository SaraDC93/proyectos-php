<?php

// Definimos la clase Database para manejar la conexión a la base de datos
class Database {

     // Propiedades privadas para los parámetros de la conexión a la base de datos
    private $host = "127.0.0.1";
    private $db_name = "SDC_books";
    private $username = "usuSDC";
    private $password = "Tareas";
    public $conn;

      // Método para obtener la conexión a la base de datos
    public function getConnection() {
        $this->conn = null; // Inicializamos la conexión a null para evitar valores antiguos
        try {
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        // Devolvemos la conexión (null si hubo error)
        return $this->conn;
    }
}