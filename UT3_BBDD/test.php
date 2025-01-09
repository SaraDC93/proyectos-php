<?php
if (!function_exists('mysqli_init') && !extension_loaded('mysqli')) {
 echo 'No tengo mysqli!!!';
} else {
 echo 'Tengo la extensión mysqli!';
}
?>