<?php

//header("Access-Control-Allow-Origin: http://127.0.0.1:5000"); // Dominio del frontend
//header("Access-Control-Allow-Credentials: true"); // Permitir cookies
//header("Access-Control-Allow-Headers: Content-Type"); // Permitir encabezados necesarios
//header("Access-Control-Allow-Methods: POST, GET, OPTIONS");

session_start(); // Inicia la sesión

// Configuración de errores
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/errors.log');

error_log("Sesión activa: " . session_id());
error_log("Cookies recibidas: " . print_r($_COOKIE, true));
error_log("Contenido de la sesión: " . print_r($_SESSION, true));

// Si la solicitud es de tipo OPTIONS, no se procesa y se devuelve un 200 OK
if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    http_response_code(200);
    exit();
}


$check=$_SESSION['userId'];
error_log("valor del usuario en la sesión en tasks.php".$check);

if (!isset($_SESSION['userId'] )) {
    http_response_code(401); // No autorizado
    echo json_encode(["message" => "No autorizado"]);
    exit();
}

// Aquí puedes agregar lógica para insertar tareas en la base de datos
require 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $due_date = $_POST['due_date'];
    $userId = $_SESSION['userId']; // Obtén el ID del usuario de la sesión
    try{
    // Inserta la tarea en la base de datos
    $stmt = $pdo->prepare("INSERT INTO tasks (title, description, due_date, user_id) VALUES (?, ?, ?, ?)");
    $stmt->execute([$title, $description, $due_date, $userId]);

    http_response_code(200);
    echo json_encode(["message" => "Tarea agregada exitosamente."]);
    } catch (PDOException $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Error al crear aqui la tarea: ' . $e->getMessage()]);
    }   
    
} else {
    http_response_code(405);
    echo json_encode(["message" => "Método no permitido."]);
}
?>
