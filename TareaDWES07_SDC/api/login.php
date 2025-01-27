<?php
include 'config.php';
session_start();

//Configuración de errores
ini_set('display_errors', 0);
ini_set('log_errors', 1);
ini_set('error_log', __DIR__ . '/errors.log');


$data = json_decode(file_get_contents("php://input"), true);
$email = $data['email'];
$password = $data['password'];

$sql = "SELECT * FROM users WHERE email = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$email]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

error_log($user['password']);
error_log($user['id']);

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user_id'] = $user['id'];
    echo json_encode(['userId' => $user['id'], 'message' => 'Inicio de sesión exitoso.']);
} else {
    echo json_encode(["error" => "Credenciales incorrectas"]);
}

?>
