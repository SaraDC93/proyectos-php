<?php
session_start();

if ($_POST) {
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    // Supongamos que estas son las credenciales correctas
    $usuario_correcto = "admin";
    $password_correcto = "1234";

    // Comprobar credenciales
    if ($usuario == $usuario_correcto && $password == $password_correcto) {
        // Guardar los datos del usuario en la sesión
        $_SESSION['usuario'] = $usuario;
        header("Location: bienvenida.php"); // Redirigir a la página de bienvenida
        exit;
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
</head>
<body>
    <h2>Iniciar Sesión</h2>
    <form method="post" action="login.php">
        <label for="usuario">Usuario:</label><br>
        <input type="text" id="usuario" name="usuario" required><br><br>

        <label for="password">Contraseña:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>
