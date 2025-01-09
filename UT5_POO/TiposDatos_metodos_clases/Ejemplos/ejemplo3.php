<?php

class Persona {
    private string $nombre;
    private int $edad;

    // Constructor con tipo de dato personalizado
    public function __construct(string $nombre, int $edad) {
        $this->nombre = $nombre;
        $this->edad = $edad;
    }

    // Método para saludar
    public function saludar(): void {
        echo "¡Hola, mi nombre es " . $this->nombre . " y tengo " . $this->edad . " años!";
    }
}

// Crear un objeto de la clase Persona
$persona = new Persona("Juan", 25);

// Llamar al método saludar
$persona->saludar(); // ¡Hola, mi nombre es Juan y tengo 25 años!

?>