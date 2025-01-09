<?php

class Estudiante {
    private $notas = [];

    // Método para agregar las notas al estudiante
    public function agregarNotas(array $notas): void {
        $this->notas = $notas;
    }

    // Método para calcular el promedio de las notas
    public function calcularPromedio(): float {
        $suma = array_sum($this->notas);
        $cantidad = count($this->notas);
        return $cantidad > 0 ? $suma / $cantidad : 0;
    }
}

// Crear un objeto de la clase Estudiante
$estudiante = new Estudiante();

// Usar el método para agregar notas
$estudiante->agregarNotas([7, 8, 9, 6, 10]);

// Calcular y mostrar el promedio
echo "El promedio de notas es: " . $estudiante->calcularPromedio(); // Promedio de notas

?>