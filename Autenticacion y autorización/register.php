<?php
header('Access-Control-Allow-Origin: *'); // Permitir solicitudes de cualquier origen
header('Access-Control-Allow-Methods: POST'); // Permitir solo el método POST
header('Access-Control-Allow-Headers: Content-Type'); // Permitir encabezados de tipo de contenido
header('Content-Type: application/json');
require 'config.php';

$data = json_decode(file_get_contents("php://input"));

if (!isset($data->email) || !isset($data->password)) {
 echo json_encode(["message" => "Faltan campos requeridos."]);
 exit;
}

$email = $data->email;
$password = $data->password;

// Utilizar password_hash para almacenar la contraseña
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

try {
 $stmt = $pdo->prepare("INSERT INTO users (email, password) VALUES (?, ?)");
 $stmt->execute([$email, $hashedPassword]);
 echo json_encode(["message" => "Usuario registrado exitosamente."]);
} catch (PDOException $e) {
 if ($e->getCode() === 23000) { // Código de error para violación de clave única
 echo json_encode(["message" => "El correo electrónico ya está en uso."]);
 } else {
 echo json_encode(["message" => "Error en el registro."]);
 }
}

