<?php
session_start();

echo "<h2>Carrito de Compras</h2>";

if (isset($_SESSION['carrito']) && count($_SESSION['carrito']) > 0) {
    foreach ($_SESSION['carrito'] as $item) {
        echo "Producto: " . htmlspecialchars($item['producto']) . "<br>";
        echo "Cantidad: " . htmlspecialchars($item['cantidad']) . "<br><br>";
    }
} else {
    echo "Tu carrito está vacío.";
}

echo "<br><a href='agregar_carrito.php'>Agregar más productos</a>";
echo "<br><a href='vaciar_carrito.php'>Vaciar Carrito</a>";
?>
