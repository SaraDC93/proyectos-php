<?php

class Coche {
    private $enMarcha = false;
    private $velocidad = 0;

    // Método para arrancar el coche
    public function arrancar(bool $enMarcha): void {
        $this->enMarcha = $enMarcha;
        if ($enMarcha) {
            echo "El coche está en marcha.\n";
        } else {
            echo "El coche está apagado.\n";
        }
    }

    // Método para establecer la velocidad
    public function establecerVelocidad(int $velocidad): void {
        $this->velocidad = $velocidad;
        echo "La velocidad es ahora " . $this->velocidad . " km/h.\n";
    }
}

// Crear un objeto de la clase Coche
$coche = new Coche();

// Usar los métodos con los tipos correctos
$coche->arrancar(true); // El coche arranca
$coche->establecerVelocidad(80); // Establecer velocidad de 80 km/h

?>