<?php

header('Content-Type: application/json');

$products = json_decode(file_get_contents('php://input'), true);

if (json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode(['error' => 'Invalid JSON']);
    exit();
}

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'add':
        addProduct($products);
        break;
    case 'total_value':
        calculateTotalValue($products);
        break;
    case 'low_stock':
        getLowStockProducts($products);
        break;
    default:
        echo json_encode(['error' => 'Invalid action']);
        break;
}

function addProduct($products)
{
    foreach ($products as $product) {
        if (isset($product['id'], $product['nombre'], $product['cantidad'], $product['precio'])) {
            // Aquí podrías añadir el producto a una base de datos o un array
            echo json_encode([
                'success' => 'Producto añadido con éxito',
                'product' => $product
            ]);
        } else {
            echo json_encode(['error' => 'Datos del producto incompletos']);
        }
    }
}

function calculateTotalValue($products)
{
    $totalValue = 0;
    foreach ($products as $product) {
        $totalValue += $product['cantidad'] * $product['precio'];
    }
    echo json_encode(['total_value' => $totalValue]);
}

function getLowStockProducts($products)
{
    $lowStockProducts = [];
    foreach ($products as $product) {
        if ($product['cantidad'] < 5) {
            $lowStockProducts[] = $product;
        }
    }
    echo json_encode(['low_stock_products' => $lowStockProducts]);
}
?>
