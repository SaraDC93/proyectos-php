<?php

class MiClase {
    public static $contador = 0;

    public static function incrementarContador() {
        self::$contador++;
    }
}

echo MiClase::$contador; // Acceder directamente al atributo estático
MiClase::incrementarContador(); // Llamar al método estático
echo MiClase::$contador; // 1

?>