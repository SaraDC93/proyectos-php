<?php
// Iniciamos la sesión
session_start();

// Si el usuario aún no se ha autentificado, pedimos las credenciales
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Contenido restringido"');
    header("HTTP/1.0 401 Unauthorized");
    exit;
}

// Verificamos si ya hay un usuario guardado en la sesión
if (!isset($_SESSION['usuario'])) {
    try {
        // Conectamos a la base de datos usando PDO
        $dsn = "mysql:host=localhost;dbname=dwes;charset=utf8";
        $usuarioDB = "dwes";
        $contrasenaDB = "abc123.";
        $pdo = new PDO($dsn, $usuarioDB, $contrasenaDB);
        
        // Configuramos el modo de error de PDO para excepciones
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparamos la consulta usando sentencias preparadas para evitar inyecciones SQL
        $stmt = $pdo->prepare("SELECT usuario FROM usuarios WHERE usuario = :usuario AND contrasena = MD5(:contrasena)");
        
        // Ejecutamos la consulta con los valores de usuario y contraseña enviados por HTTP
        $stmt->execute([
            ':usuario' => $_SERVER['PHP_AUTH_USER'],
            ':contrasena' => $_SERVER['PHP_AUTH_PW']
        ]);
        
        // Si no se encuentra un resultado, pedimos las credenciales nuevamente
        if ($stmt->rowCount() == 0) {
            header('WWW-Authenticate: Basic realm="Contenido restringido"');
            header("HTTP/1.0 401 Unauthorized");
            exit;
        } else {
            // Guardamos el usuario en la sesión si la autenticación fue exitosa
            $_SESSION['usuario'] = $_SERVER['PHP_AUTH_USER'];
        }
    } catch (PDOException $e) {
        // Mostramos un mensaje de error en caso de fallo en la conexión o consulta
        echo "Error en la conexión a la base de datos: " . $e->getMessage();
        exit;
    }
}

// Si ya está autentificado
if (isset($_SESSION['usuario'])) {
    // Comprobamos si se ha enviado el formulario para limpiar el registro
    if (isset($_POST['limpiar'])) {
        unset($_SESSION['visita']);
    } else {
        // Si no existe 'visita', lo inicializamos
        if (!isset($_SESSION['visita'])) {
            $_SESSION['visita'] = [];
        }
        // Registramos la hora de la visita
        $_SESSION['visita'][] = time();
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
    "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Tema 4: Cookies en autentificación HTTP</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if (isset($_SESSION['usuario'])) {
    echo "Nombre de usuario: " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "<br />";
    echo "Hash de la contraseña: " . md5($_SERVER['PHP_AUTH_PW']) . "<br />";

    if (empty($_SESSION['visita'])) {
        echo "Bienvenido. Esta es su primera visita.";
    } else {
        date_default_timezone_set('Europe/Madrid');
        foreach ($_SESSION['visita'] as $v) {
            echo date("d/m/y \a \l\a\s H:i", $v) . "<br />";
        }
    }
?>
    <form id='vaciar' action='<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>' method='post'>
        <input type='submit' name='limpiar' value='Limpiar registro'/>
    </form>
<?php
} else {
    echo "Error en la autenticación.<br />";
}
?>
</body>
</html>
