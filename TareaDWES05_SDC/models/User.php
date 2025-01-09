<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function register($email, $password) {
        try
        {
            $hash = crypt($password, 'salt');
            $stmt = $this->pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
            return $stmt->execute([$email, $hash]); 
        }catch(PDOException $e){
            return false;
        }
    }

    public function login($email, $password) {
        try{
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $user = $stmt->fetch();
            if ($user && crypt($password, $user['password']) === $user['password']) {
                $_SESSION['user'] = $user['email'];
                $_SESSION['user_id'] = $user['id']; // Guardamos el ID del usuario logueado
                return true;
            }
            return false;
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        
    }
    
}
?>
