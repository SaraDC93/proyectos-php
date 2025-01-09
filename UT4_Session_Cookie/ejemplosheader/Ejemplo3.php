<?php
// Ejemplo3: forzar la descarga de un archivo

$archivo = 'documento.pdf';

// Configurar encabezados para forzar la descarga
header("Content-Type: application/pdf");
header("Content-Disposition: attachment; filename=\"" . basename($archivo) . "\"");
header("Content-Length: " . filesize($archivo));

// Enviar el archivo al navegador
readfile($archivo);
exit;
?>
