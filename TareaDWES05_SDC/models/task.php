<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class Task {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAllTasksByUser($userId) {
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE user_id = ?");
        $stmt->execute([$userId]);
        return $stmt->fetchAll();

        }catch(PDOException $e){
            echo $e->getMessage();
        }

        
    }

    public function getTaskByIdAndUser($taskId, $userId) {
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM tasks WHERE id = ? AND user_id = ?");
            $stmt->execute([$taskId, $userId]);
            return $stmt->fetch(); // Retorna el libro si existe, o false si no lo encuentra

        }catch(PDOException $e){
            echo $e->getMessage();
        }
      
    }
    

    public function createTask($title, $description, $userId) {
        try{
            $stmt = $this->pdo->prepare("INSERT INTO tasks (title, description, user_id) VALUES (?, ?, ?)");
            return $stmt->execute([$title, $description, $userId]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
      
    }

    public function updateTask($taskId, $title, $description) {
        try{
            $stmt = $this->pdo->prepare("UPDATE tasks SET title = ?, description = ? WHERE id = ?");
            return $stmt->execute([$title, $description, $taskId]);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }

    public function deleteTask($taskId) {
        try{
            $stmt = $this->pdo->prepare("DELETE FROM tasks WHERE id = ?");
            return $stmt->execute([$taskId]);
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        
    }
}
?>