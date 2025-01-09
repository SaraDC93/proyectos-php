<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Inicio de Sesión</title>
</head>
<body>
    <h2>Inicio de Sesión</h2>
    <form action="" method="POST">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conexión a la base de datos
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=prueba', 'root', 'Tokio2324');

        // Recibe los datos del formulario
        $nombre = $_POST['nombre'];
        $contraseña_ingresada = $_POST['contraseña'];

        // Buscar el hash de la contraseña del usuario en la base de datos
        $sql = "SELECT password_hash FROM usuarios WHERE nombre = :nombre";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($usuario && password_verify($contraseña_ingresada, $usuario['password_hash'])) {
            echo "Inicio de sesión exitoso.";
            // Puedes iniciar una sesión aquí, por ejemplo, con $_SESSION['nombre'] = $nombre;
        } else {
            echo "Nombre de usuario o contraseña incorrecta.";
        }
    }
    ?>
</body>
</html>
