<?php
session_start();
session_unset();   // Eliminar las variables de sesión
session_destroy(); // Destruir la sesión

echo "Has cerrado sesión correctamente. <a href='login.php'>Iniciar sesión de nuevo</a>";
?>
