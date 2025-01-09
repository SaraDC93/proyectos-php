<?php
session_start();

if (isset($_SESSION['usuario'])) {
    echo "Bienvenido, " . $_SESSION['usuario'] . "!";
    echo "<br><a href='logout.php'>Cerrar sesión</a>";
} else {
    echo "No has iniciado sesión. <a href='login.php'>Iniciar sesión</a>";
}
?>
