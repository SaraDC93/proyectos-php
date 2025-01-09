<?php
//Activamos el modo depuracion y nos detecta los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'bd.php';

// Obtener todos los empleados, su id y el telefono 
$sql = "SELECT empleados.id, empleados.nombre AS empleado_nombre, empleados.telefono AS empleado_telefono
        FROM empleados";
       
$stmt = $pdo->query($sql);
$empleados = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD Empleados</title>
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <h1>Lista de Empleados</h1> 
    <a href="crear.php">Añadir nuevo empleado</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($empleados as $empleado): ?>
            <tr>
                <td><?= htmlspecialchars($empleado['id']) ?></td>
                <td><?= htmlspecialchars($empleado['empleado_nombre']) ?></td>
                <td><?= htmlspecialchars($empleado['empleado_telefono']) ?></td>
                <td>
                    <a href="editar.php?id=<?= $empleado['id'] ?>">Editar</a>
                    <a href="eliminar.php?id=<?= $empleado['id'] ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
