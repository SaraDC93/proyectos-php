<?php
// Conexión a la base de datos usando PDO
$pdo = new PDO('mysql:host=127.0.0.1;dbname=hash', 'root', 'Tokio2324');

// Datos ingresados por el usuario en el formulario de inicio de sesión
$nombre = 'sara';
$contraseña_ingresada = '1234';

// Recuperar el hash de la contraseña del usuario en la base de datos
$sql = "SELECT password_hash FROM usuarios WHERE nombre = :nombre";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':nombre', $nombre);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario) {
    // Verificar la contraseña ingresada con el hash almacenado
    if (password_verify($contraseña_ingresada, $usuario['password_hash'])) {
        echo "Inicio de sesión exitoso.";
        // Aquí puedes establecer una sesión o realizar otras acciones de inicio de sesión
    } else {
        echo "Contraseña incorrecta.";
    }
} else {
    echo "El usuario no existe.";
}