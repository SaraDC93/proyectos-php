<?php
//redirección Condicional basada en Cookies
//se verifica si lacookie sesion_usuario está establecida. 
//Si existe, redirige a bienvenida.php. Si no, muestra un mensaje pidiendo al usuario que inicie sesión.

if (isset($_COOKIE['sesion_usuario'])) {
    header("Location: bienvenida.php");
    exit;
} else {
    echo "Por favor, inicia sesión para acceder a esta página.";
}
?>
