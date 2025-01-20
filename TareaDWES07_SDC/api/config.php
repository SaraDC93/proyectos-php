<?php
$host = "localhost";
$db_name = "booktracker";
$username = "usuSDC";  // Cambia esto si tienes otro usuario
$password = "Tareas";      // Agrega la contraseña si la tienes

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error en la conexión: " . $e->getMessage());
}
?>
