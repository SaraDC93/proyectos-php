<?php
//conectamos la bd
try {

    $options = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");

    $pdo = new PDO ("mysql:host=127.0.0.1;dbname=empleados", "root", "Tokio2324", $options);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}catch (PDOException $e) {
    die("Error de la conexión a la bd: ". $e->getMessage());
}

?>
