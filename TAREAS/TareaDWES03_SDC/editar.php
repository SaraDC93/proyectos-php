<?php
//Conectamos con la base de datos con el try-catch
try{ 
    $options = array (PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"); //esta línea asegura que la conexión a la base de datos utilice la codificación UTF-8

    $pdo = new PDO("mysql:host=127.0.0.1;dbname=dwes", "root", "Tokio2324", $options);   //constructor
    $pdo-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     //establece el modo de manejo de errores para la conexión PDO a la base de datos. 
}catch (PDOException $e) {
    die("Error de conexión: " .$e ->getMessage());
}



//obtenemos los datos del producto
if(isset($_POST['cod'])){   //si existe la variable, se hace la consulta
    try{
        $codigoProducto = $_POST['cod'];
        $stmt = $pdo->prepare("SELECT * FROM producto WHERE cod = ?");
        $stmt->bindParam(1,$codigoProducto);    //se asocia el parametro al valor
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC); //como el while

    }catch(PDOException $e){
        echo "<p>Error en la consulta de stock: " .$e->getMessage()."</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarea: Edición de un producto</title>
    <link rel="stylesheet" href="dwes.css"> 
</head>
<body>
    <div id="edicion">
    <h1>Tarea: Edición de un producto</h1>
    </div>

    <div id="cambios">
    <?php if ($producto): ?>
        <form method="post" action="actualizar.php">
            <input type="hidden" name="cod" value="<?= $producto['cod'] ?>">
            <label for="nombre_corto">Nombre corto:</label>
            <input type="text" id="nombre_corto" name="nombre_corto" value="<?= htmlspecialchars($producto['nombre_corto']) ?>" required><br>
            
            <label for="nombre">Nombre:</label>
            <!-- Se pone ?? para que devuelva un string vacío si la variable $producto['nombre'] es null (como en este caso) se puede deber a la version de php-->
            <input type="text" id="nombre" name="nombre" value="<?= htmlspecialchars($producto['nombre']?? '')?>" required><br>
            
            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required><?= htmlspecialchars($producto['descripcion']) ?></textarea><br>
            
            <label for="PVP">PVP:</label>
            <input type="text" id="PVP" name="PVP" value="<?= htmlspecialchars($producto['PVP']) ?>" required><br>
            
            <button type="submit" name="accion" value="actualizar">Actualizar</button>
        </form>
        <form method="post" action="listado.php">
            <button type="submit"">Cancelar</button>
        </form>
    <?php else: ?>
        <p>El producto no se ha encontrado</p>
    <?php endif; ?>
    </div>

</body>
</html>