<?php
session_start();

if ($_POST) {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    // Comprobar si el carrito ya existe en la sesión
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }

    // Añadir el producto al carrito
    $_SESSION['carrito'][] = [
        'producto' => $producto,
        'cantidad' => $cantidad,
    ];

    echo "Producto agregado al carrito.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar al Carrito</title>
</head>
<body>
    <h2>Agregar Producto al Carrito</h2>
    <form method="post" action="agregar_carrito.php">
        <label for="producto">Producto:</label><br>
        <input type="text" id="producto" name="producto" required><br><br>

        <label for="cantidad">Cantidad:</label><br>
        <input type="number" id="cantidad" name="cantidad" required><br><br>

        <button type="submit">Agregar al Carrito</button>
    </form>

    <br><a href="ver_carrito.php">Ver Carrito</a>
</body>
</html>
