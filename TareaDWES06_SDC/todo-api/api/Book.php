<?php
class Book {
    private $conn; // Conexión a la bbdd
    private $table = "books"; // Nombre de la tabla en la bbdd

    //atributos
    public $id;
    public $title;
    public $author;
    public $published_year;
    public $genre;
    public $created_at;

    // Constructor que recibe la conexión de la bbdd
    public function __construct($db) {
        $this->conn = $db;
    }

    // Método para leer todos los libros
    public function read() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    // Método para crear un libro
    public function create() {
        try{
            $query = "INSERT INTO " . $this->table . " SET title=?, author=?, published_year=?, genre=?";
            $stmt = $this->conn->prepare($query);
    
            $stmt->bindParam(1, $this->title);
            $stmt->bindParam(2, $this->author);
            $stmt->bindParam(3, $this->published_year);
            $stmt->bindParam(4, $this->genre);
    
            $stmt->execute();
            return true;
        }catch(PDOException $e)
        {
            return false;
        }
    }

    // Método para actualizar un libro
    public function update() {
        $query = "UPDATE " . $this->table . " SET title = ?, author = ?, published_year = ?, genre = ? WHERE id = ?";
        $stmt = $this->conn->prepare($query);
    
        $stmt->bindParam(1, $this->title);
        $stmt->bindParam(2, $this->author);
        $stmt->bindParam(3, $this->published_year);
        $stmt->bindParam(4, $this->genre);
        $stmt->bindParam(5, $this->id);
    
        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
    
    // Método para eliminar un libro
    public function delete() {
        $query = "DELETE FROM " . $this->table . " WHERE id = ?";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->id);

        $stmt->execute();
        if ($stmt->rowCount() > 0) {
            return true;
        }
        return false;
    }
}