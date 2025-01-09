<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'Database.php';
include_once 'Task.php';

$database = new Database();
$db = $database->getConnection();

$task = new Task($db);

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') {
    $stmt = $task->read();
    $tasks = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $tasks[] = $row;
    }
    echo json_encode($tasks);
} elseif ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $task->title = $data->title;
    $task->description = $data->description;
    $task->is_completed = 0;
   

    if ($task->create()) {
        echo json_encode(["message" => "Tarea agregado exitosamente."]);
    } else {
        echo json_encode(["message" => "Error al agregar la tarea."]);
    }
} elseif ($method == 'PUT') {
    $data = json_decode(file_get_contents("php://input"));
    $task->id = $data->id;
    $task->is_completed = $data->is_completed;
    
    
    
    if ($task->update()) {
        echo json_encode(["message" => "Tarea actualizado exitosamente."]);
    } else {
        echo json_encode(["message" => "Error al actualizar la tarea."]);
    }
} elseif ($method == 'DELETE') {
    $data = json_decode(file_get_contents("php://input"));
    $task->id = $data->id;

    if ($task->delete()) {
        echo json_encode(["message" => "Tarea eliminada exitosamente."]);
    } else {
        echo json_encode(["message" => "Error al eliminar la tarea."]);
    }
} else {
    echo json_encode(["message" => "Método no permitido."]);
}
