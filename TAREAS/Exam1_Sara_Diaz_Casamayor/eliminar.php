<?php
//Activamos el modo depuracion y nos detecta los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'bd.php';

// Obtener el ID del empleado a eliminar
$id = $_GET['id'];

// Eliminar empleado
$sql = "DELETE FROM empleados WHERE id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$id]);

header('Location: index.php');
exit();

?>
