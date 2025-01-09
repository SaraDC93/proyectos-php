<?php
// Comprobar si la cookie 'tema_preferido' existe
$color = isset($_COOKIE['color_preferido']) ? $_COOKIE['color_preferido'] : 'claro';

// Aplicar el tema preferido
?>

<!DOCTYPE html>
<html>
<head>
    <title>Color Actual</title>
    <?php if ($tema == 'oscuro'): ?>
    <style>
        body {
            background-color: #333;
            color: #fff;
        }
    </style>
    <?php else: ?>
    <style>
        body {
            background-color: #fff;
            color: #000;
        }
    </style>
    <?php endif; ?>
</head>
<body>
    <h1>Tema: <?php echo $tema == 'oscuro' ? 'Oscuro' : 'Claro'; ?></h1>
    <a href="preferencia.php">Cambiar Color</a>
</body>
</html>