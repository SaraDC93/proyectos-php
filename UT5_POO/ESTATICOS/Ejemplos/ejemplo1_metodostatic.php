<?php

class MiClase {
    public static function saludo() {
        echo "¡Hola desde un método estático!";
    }
}

MiClase::saludo(); // Llamar a un método estático sin crear una instancia

?>