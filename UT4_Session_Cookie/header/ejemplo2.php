<?php
//establecer el tipo JSON

header("Content-Type: application/json");

//datos a enviar en formato JSON
$data = [
    "nombre" => "Sara",
    "edad" => 31,
    "pais" => "España"
];

//convertir el array en JSON y enviarlo
echo json_encode($data);


?>