<?php
/*Ejemplo4: control de caché
Explicación: Cache-Control, Pragma, y Expires configuran los encabezados de caché, 
evitando que el navegador almacene la página y forzando una actualización cada vez que se visita.
*/

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache"); // Solo para navegadores antiguos
header("Expires: Thu, 01 Jan 1970 00:00:00 GMT"); // Fecha pasada para evitar la caché

echo "Esta página no se almacenará en caché.";
?>
