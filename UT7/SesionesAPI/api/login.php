<?php

//header("Access-Control-Allow-Origin: http://127.0.0.1:5000"); // Dominio del frontend
//header("Access-Control-Allow-Credentials: true"); // Permitir cookies
//header("Access-Control-Allow-Headers: Content-Type"); // Permitir encabezados necesarios
//header("Access-Control-Allow-Methods: POST, GET, OPTIONS");


session_start(); // Inicia la sesión
session_set_cookie_params([
    'lifetime' => 3600, // Tiempo de vida de la cookie (1 hora)
    'path' => '/',
    'secure' => false, // Cambiar a true si usas HTTPS
    'httponly' => true,
]);

// Configuración de errores
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/errors.log');//fichero de errores en el mismo directorio que este .php


require 'config.php'; // Incluye la configuración de la base de datos

// Verificar si los datos están en $_POST

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recuperar datos
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    error_log($email);
    error_log($password);



    $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    error_log("user en login.php".$user['id']);
    
   

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userId'] = $user['id']; // Almacena el ID del usuario en la sesión
        echo json_encode(["message" => "Inicio de sesión exitoso.","userId"=>$user['id']]);
    } else {
        http_response_code(401); // No autorizado
        echo json_encode(["message" => "Credenciales incorrectas."]);
    }

}else{
    
}
?>