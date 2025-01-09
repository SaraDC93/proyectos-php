<?php
//Forzar la descarga de un archivo
    $archivo = "documento.pdf";

//Configurar encabezados para forzar la descarga
    header("Content-Type: application/json");
    header("Content-Disposition: attachment; filename=\"" .basename($archivo). "\"");
    header("Content-Length: ". filesize($archivo));

//enviar el archivo al navegador
    readfile($archivo);
    exit;

?>