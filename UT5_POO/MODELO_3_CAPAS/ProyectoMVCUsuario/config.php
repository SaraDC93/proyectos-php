<?php
// config.php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'mvc_login');
define('DB_USER', 'login'); // Cambiar por el usuario de tu base de datos
define('DB_PASS', 'login');     // Cambiar por la contraseña de tu base de datos

function obtenerConexion() {
    try {
        $conexion = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    } catch (PDOException $e) {
        echo "Error de conexión: " . $e->getMessage();
        exit;
    }
}
?>
