<?php
// Ejemplo1. Redireccionar a otra página
// Verificación simulada de usuario y contraseña
$usuario_correcto = true;

if ($usuario_correcto) {
    // Redirecciona a bienvenida.php
    header("Location: bienvenida.php");
    exit; // Siempre usa exit después de una redirección para detener el resto del script
} else {
    echo "Usuario o contraseña incorrectos.";
}
?>
