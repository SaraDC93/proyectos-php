<?php

//Ejemplo2: establecer el tipo JSON

header("Content-Type: application/json");

// Datos a enviar en formato JSON
$data = [
    "nombre" => "Carlos",
    "edad" => 28,
    "pais" => "España"
];

// Convertir el array en JSON y enviarlo
echo json_encode($data);
?>
