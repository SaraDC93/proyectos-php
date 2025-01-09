<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
</head>
<body>
    <h2>Registro de Usuario</h2>
    <form action="" method="POST">
        <label for="nombre">Nombre de Usuario:</label>
        <input type="text" name="nombre" required>
        <br>
        <label for="contraseña">Contraseña:</label>
        <input type="password" name="contraseña" required>
        <br>
        <button type="submit">Registrar</button>
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        try{
        // Conexión a la base de datos
        $pdo = new PDO('mysql:host=127.0.0.1;dbname=prueba', 'root', 'Tokio2324');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Recibe los datos del formulario
        $nombre = $_POST['nombre'];
        $contraseña = $_POST['contraseña'];

        // Genera un hash seguro para la contraseña
        $password_hash = password_hash($contraseña, PASSWORD_DEFAULT);

        // Insertar en la base de datos
        $sql = "INSERT INTO usuarios (nombre, password_hash) VALUES (:nombre, :password_hash)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':password_hash', $password_hash);

        if ($stmt->execute()) {
            echo "Usuario registrado correctamente.";
        } else {
            echo "Error al registrar usuario o el nombre de usuario ya existe.";
        }
    }catch(PDOException $e){

       // Verificar si el error es por duplicado de nombre de usuario
       if ($e->getCode() == 23000) { // Código 23000: clave duplicada en MySQL
            echo "El nombre de usuario ya existe. Por favor, elige otro.";
        } else {
            echo "Error al registrar usuario: " . $e->getMessage();
        }
    }
    }
    ?>
</body>
</html>
