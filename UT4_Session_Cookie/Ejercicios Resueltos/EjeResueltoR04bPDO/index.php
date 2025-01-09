<?php
// Si el usuario aún no se ha autentificado, pedimos las credenciales
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Contenido restringido"');
    header("HTTP/1.0 401 Unauthorized");
    exit;
} else {
    // Conexión con PDO y manejo de excepciones
    try {
        $dwes = new PDO('mysql:host=127.0.0.1;dbname=dwes', 'dwes', 'abc123.');
        $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Manejo de errores con excepciones
    } catch (PDOException $e) {
        // Si ocurre un error de conexión
        $error = $e->getMessage();
        echo "Error al conectar con la base de datos: $error";
        exit;
    }

    // Si la conexión es correcta, seguimos
    date_default_timezone_set('Europe/Madrid');

    // Usamos prepared statements para evitar inyecciones SQL
    $sql = "SELECT usuario FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena";
    $consulta = $dwes->prepare($sql);
    $hashed_password = md5($_SERVER['PHP_AUTH_PW']); // Usamos MD5 como hash de contraseña
    $consulta->bindParam(':usuario', $_SERVER['PHP_AUTH_USER']);
    $consulta->bindParam(':contrasena', $hashed_password);
    $consulta->execute();

    // Si no existe el usuario o la contraseña es incorrecta, pedimos las credenciales de nuevo
    if ($consulta->rowCount() == 0) {
        header('WWW-Authenticate: Basic realm="Contenido restringido"');
        header("HTTP/1.0 401 Unauthorized");
        exit;
    } else {
        // Si hay éxito, gestionamos la cookie del último login
        if (isset($_COOKIE['ultimo_login'])) {
            $ultimo_login = $_COOKIE['ultimo_login'];
        }

        // Configuramos la cookie para que expire en una hora y HttpOnly para mayor seguridad
        setcookie("ultimo_login", time(), time() + 3600, "", "", false, true);
    }

    // Cerramos la conexión a la base de datos
    $dwes = null;
}
?>

<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 4 : Desarrollo de aplicaciones web con PHP -->
<!-- Ejemplo: Cookies en autentificación HTTP -->
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Ejemplo Tema 4: Cookies en autentificación HTTP</title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>
<?php
if (!isset($error)) {
    echo "Nombre de usuario: " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "<br />";
    echo "Hash de la contraseña: " . md5($_SERVER['PHP_AUTH_PW']) . "<br />";
    if (isset($ultimo_login)) {
        echo "Último login: " . date("d/m/y \a \l\a\s H:i", $ultimo_login);
    } else {
        echo "Bienvenido. Esta es su primera visita.";
    }
} else {
    echo "Se ha producido el error: $error.<br />";
}
?>
</body>
</html>
