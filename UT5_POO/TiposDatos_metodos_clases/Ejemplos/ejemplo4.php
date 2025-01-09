<?php

class Operaciones {
    // Método para incrementar la edad
    public function incrementarEdad(int &$edad): void {
        $edad++;
    }
}

// Crear un objeto de la clase Operaciones
$operacion = new Operaciones();

// Variable que contiene la edad
$edad = 30;

// Pasar la variable por referencia
$operacion->incrementarEdad($edad);

echo "La edad incrementada es: " . $edad; // Debería mostrar 31

?>