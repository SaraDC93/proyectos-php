<?php

// Se define una clase llamada Contador
class Contador {
    // Se declara una propiedad estática llamada $contador, inicializada en 0
    public static $contador = 0;

    // Se define un método estático para incrementar el contador y mostrar su valor
    public static function incrementarContador() {
        self::$contador++ ."<br>";
    }

    // Se define un método estático para obtener el valor actual del contador
    public static function obtenerContador() {
        return self::$contador;
    }
}

// Llamadas a la función incrementarContador() de la clase Contador y se incrementara el contador en cada llamada
Contador::incrementarContador();
Contador::incrementarContador();
Contador::incrementarContador();
Contador::incrementarContador();

//imprimimos el valor final del contador despues de todas las implementaciones
echo "El valor del contador es: " .Contador::obtenerContador();
?>