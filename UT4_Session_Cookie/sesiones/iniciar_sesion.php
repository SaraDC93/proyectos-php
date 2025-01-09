<?php

// Iniciar una nueva sesión o reanudar la existente
session_start();

// Almacenar datos en la sesión
$_SESSION['usuario'] = 'Sara Diaz';
$_SESSION['email'] = 'juan.perez@example.com';

echo "Sesión iniciada. Bienvenida, " . $_SESSION['usuario'] . "!";

?>