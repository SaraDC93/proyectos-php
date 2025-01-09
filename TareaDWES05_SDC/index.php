<?php

//configura el entorno para mostrar todos los errores y advertencias en pantalla
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

/*gestiona la persistencia de datos del usuario mediante sesiones e 
incluye archivos esenciales para la conexión a la base de datos y 
los controladores de usuarios y tareas */
session_start();
require_once './config/database.php';
require_once './controllers/UserController.php';
require_once './controllers/TaskController.php';

$action = $_GET['action'] ?? 'login';
$controller = null;

switch ($action) {
    case 'login':
    case 'register':
    case 'logout':
        $controller = new UserController();
        break;
    case 'tasks':
    case 'createTask':
    case 'editTask':
    case 'deleteTask':
        $controller = new TaskController();
        break;
    default:
        die("Acción no permitida.");
}

$controller->handleRequest($action);
?>
