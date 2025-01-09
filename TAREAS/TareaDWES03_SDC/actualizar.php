<?php
//conexión a la base de datos
    try {

        $options = array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

        $pdo = new PDO ("mysql:host=127.0.0.1;dbname=dwes", "root", "Tokio2324", $options);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     
    } catch (PDOException $e) {
        die ("Error de la conexión " .$e->getMessage());
    }

    if ($_SERVER ['REQUEST_METHOD'] == 'POST'){ //verifica si la solicitud HTTP que recibió el servidor es un método POST
        $codigoProducto = $_POST['cod'];
        $nombreCorto = $_POST['nombre_corto'];
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $PVP = $_POST['PVP'];

        try {
            $stmt = $pdo->prepare("UPDATE producto SET nombre_corto =?, nombre =?, descripcion =?, PVP =? WHERE cod =?");
            $stmt->bindParam(1, $nombreCorto);
            $stmt->bindParam(2, $nombre);
            $stmt->bindParam(3, $descripcion);
            $stmt->bindParam(4, $PVP);
            $stmt->bindParam(5, $codigoProducto);
            $stmt->execute();
            echo "<p>El producto se ha actualizado correctamente</p>";
        } catch (PDOException $e) {
            echo "<p>Error en la actualización del producto: ". $e->getMessage()."</p>";
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualización de producto</title>
    <link rel="stylesheet" href="dwes.css";
</head>
<body>

    <form method="post" action="listado.php">
   <button type="submit">Continuar</button>
    </form>
    
</body>
</html>