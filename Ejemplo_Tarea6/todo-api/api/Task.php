<?php
class Task {
    private $conn;
    private $table = "tasks";

    public $id;
    public $title;
    public $description;
    public $is_completed;

    public function __construct($db) {
        $this->conn = $db;
    }

    // Leer todas las tareas
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Crear una tarea
    public function create() {
        $query = "INSERT INTO " . $this->table . " SET title=?, description=?,is_completed=?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->title);
        $stmt->bindParam(2, $this->description);
        $stmt->bindParam(3, $this->is_completed);


        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Actualizar una tarea
    public function update() {
        $query = "UPDATE " . $this->table . " SET is_completed = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(1, $this->is_completed);
        $stmt->bindParam(2, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }

    // Eliminar una tarea
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        if ($stmt->execute()) {
            return true;
        }
        return false;
    }
}
