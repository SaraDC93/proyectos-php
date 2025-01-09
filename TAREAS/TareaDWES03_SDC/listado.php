<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title></title>
    <link href="dwes.css" rel="stylesheet" type="text/css">
</head>
<body>

<div id="encabezado">
    
    <h1>Tarea: Listado de productos de una familia</h1>
    <form id="form_seleccion" action="listado.php" method="post">
        <span> Familia: </span>
        <select name="familia">
            <?php
            // Inicializa la variable $familia
            $familia = isset($_POST['familia']) ? $_POST['familia'] : null;
            

            try {
                
                // Conexión a la base de datos
                $dwes = new PDO("mysql:host=127.0.0.1;dbname=dwes", "root", "Tokio2324");
                $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                

                // Rellenamos el desplegable con los datos de todos los productos
                $sql = "SELECT cod, nombre FROM familia";
                $resultado = $dwes->query($sql);

                // Verificamos si la consulta fue exitosa
                if ($resultado) {
                    while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value='" . htmlspecialchars($row['cod']) . "'";
                        // Si se recibió un código de producto lo seleccionamos
                        if ($familia === $row['cod']) {
                            echo " selected='true'";
                        }
                        echo ">" . htmlspecialchars($row['nombre']) . "</option>";
                    }
                }
            } catch (PDOException $e) {
                echo "<p>Error en la conexión o en la consulta: " . htmlspecialchars($e->getMessage()) . "</p>";
            }
            ?>
        </select>
        <button type="submit"> Mostrar productos</button>
    </form>
</div>

<div id="contenido">
    <h2>Productos de la familia:</h2>
    <ul>
        <?php 
        //si se ha recibido un código de familia
        if(isset($familia)){
            try{
            //consulta para obtener los productos de la familia
            $sql = "SELECT * FROM producto WHERE familia = :familia";

            $consulta = $dwes->prepare($sql);
            $consulta->bindParam(':familia', $familia);
            $consulta->execute();

            //se verifica si la consulta fue exitosa
            if($consulta){
                while($producto = $consulta->fetch(PDO::FETCH_ASSOC)){ ?>
                <li>
                    <?= htmlspecialchars($producto['nombre_corto']) ?> - <?= htmlspecialchars($producto['PVP']) ?>€
                    <form method="post" action="editar.php" style="display:inline;">
                        <input type="hidden" name="cod" value="<?= $producto['cod'] ?>">
                        <button type="submit">Editar</button>
                    </form>
                </li>

             <?php }
            }
            } catch(PDOException $e){
                echo "<p> Error en la consulta de stock: " . htmlspecialchars($e->getMessage()) . "</p>";
            }
        }
        ?>
    </ul>
</div>

<div id="pie">
    <?php
    // Cerrar la conexión
    unset($dwes);
    ?>
</div>
</body>
</html>