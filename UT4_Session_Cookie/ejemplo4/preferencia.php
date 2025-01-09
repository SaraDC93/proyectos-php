<?php
if ($_POST) {
    $color = $_POST['color'];

    // Guardar la preferencia del tema en una cookie por 1 año
    setcookie("color", $color, time() + 3600, "/");

    echo "Has seleccionado el color " . ($color == '#ffffff' ? 'blanco' :
                                        ($color == '#ffcccc' ? 'rosa claro' :
                                        ($color == '#ccffcc' ? 'verde claro' :
                                        ($color == '#ccccff' ? 'azul claro' :
                                        ($color == '#ffffcc' ? 'amarillo claro' : 'Sin preferencia')))));
    
    header("Location: preferencia.php");
    exit();
}

$color = (isset($_COOKIE['color'])) ? $_COOKIE['color'] : '#ffffff'; // Definir el color por defecto

?>

<!DOCTYPE html>
<html>
<head>
    <title>Seleccionar Color</title>
    <style>
        body {
            background-color: <?php echo $color;?>; 
        }
    </style>
</head>
<body>
    <h2>Selecciona tu color preferido:</h2>
    <form method="post">

    <label for="color">Color de fondo:</label><br>
       <select name="color" id="color"> 
            <option value="#ffffff">Blanco</option>
            <option value="#ffcccc;">Rosa Claro</option>
            <option value="#ccffcc">Verde Claro</option>
            <option value="#ccccff">Azul Claro</option>
            <option value="#ffffcc">Amarillo Claro</option>
        </select>
        <br><br>
        <button type="submit">Guardar Preferencias</button>
    </form>

    <br><a href="restablecer_preferencias.php">Restablecer preferencias</a>
</body>
</html>
