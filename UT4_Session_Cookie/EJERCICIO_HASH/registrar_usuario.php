<?php
// Conectar a la base de datos (usa PDO o MySQLi para mayor seguridad)
$pdo = new PDO('mysql:host=127.0.0.1;dbname=hash', 'root', 'Tokio2324');

// Recibir y hashear la contraseña del usuario
$nombre = 'javi';
$contraseña = '523857';
$password_hash = password_hash($contraseña, PASSWORD_DEFAULT);

// Insertar el usuario en la base de datos
$sql = "INSERT INTO usuarios (nombre, password_hash) VALUES (:nombre, :password_hash)";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':password_hash', $password_hash);

if ($stmt->execute()) {
    echo "Usuario registrado correctamente.";
} else {
    echo "Error al registrar usuario.";
}

