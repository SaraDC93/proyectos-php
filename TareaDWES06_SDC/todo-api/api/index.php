<?php

//para la visualización de errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Incluyo las clases necesarias para la bbdd y la lógica de libros
include_once 'Database.php';
include_once 'Book.php';

// Creo una instancia de la clase Database y obtengo la conexión a la bbdd
$database = new Database();
$db = $database->getConnection();

//Creo una instancia de la clase Book para manejar las operaciones relacionadas con los libros
$book = new Book($db);

$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'GET') { 
    $stmt = $book->read();  // Obtenemos todos los libros
    $books = [];

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {// Recorrer los libros obtenidos y almacenarlos en un array
        extract($row);
        $books[] = $row;
    }
    echo json_encode($books);  // Devolver los libros como una respuesta JSON
} elseif ($method == 'POST') {
    $data = json_decode(file_get_contents("php://input"));  // Creamos un nuevo libro
    if(isset($data->title, $data->author, $data->published_year, $data->genre)){
        $book->title = $data->title;
        $book->author = $data->author;
        $book->published_year = $data->published_year;
        $book->genre = $data->genre;
    
        if ($book->create()) {  // Intentamos crear el libro y devolvemos el mensaje correspondiente
            echo json_encode(["message" => "Libro agregado exitosamente."]);
        } else {
            echo json_encode(["message" => "Error al agregar el libro."]);
        }
    }else{
        echo json_encode(["ERROR" => "Datos incompletos"]);
    }
} elseif ($method == 'PUT') {
    $data = json_decode(file_get_contents("php://input")); // Actualizamos un libro existente
    $book->id = $data->id;
    $book->title = $data->title;
    $book->author = $data->author;
    $book->published_year = $data->published_year;
    $book->genre = $data->genre;

    if ($book->update()) {   // Intentamos actualizar el libro y devolvemos el mensaje correspondiente
        echo json_encode(["message" => "Libro actualizado exitosamente."]);
    } else {
        echo json_encode(["message" => "Error al actualizar el libro."]);
    }
} elseif ($method == 'DELETE') {  // Eliminar un libro
    $data = json_decode(file_get_contents("php://input"));
    $book->id = $data->id;

    if ($book->delete()) {    // Intentamos eliminar el libro y devolvemos el mensaje correspondiente
        echo json_encode(["message" => "Libro eliminado exitosamente."]);
    } else {
        echo json_encode(["message" => "Error al eliminar el libro."]);
    }
} else {
    echo json_encode(["message" => "Método no permitido."]);  // Si el método no es uno de los esperados, nos devuelve un error
}