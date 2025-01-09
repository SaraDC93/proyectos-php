<?php
// Ejemplo7-Cambiar la Zona Horaria del Servidor
// Expires se establece con una fecha futura usando la función gmdate(), 
// que formatea la fecha en un formato HTTP válido. La página expira automáticamente después de 10 minutos.

// Establecer la zona horaria a GMT para encabezados basados en fechas
date_default_timezone_set("GMT");

// Configura una fecha de vencimiento en 10 minutos
$expire = time() + 600;
header("Expires: " . gmdate("D, d M Y H:i:s", $expire) . " GMT");

echo "La página expirará en 10 minutos.";
?>
