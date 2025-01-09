<?php
// Clase base (padre)
class Empleado {
    public $nombre;
    public $salario;

    public function __construct($nombre, $salario) {
        $this->nombre = $nombre;
        $this->salario = $salario;
    }

    public function mostrarInfo() {
        echo "Nombre: " . $this->nombre . ", Salario: " . $this->salario . "<br>";
    }
}

// Clase derivada (hija) que hereda de Empleado
class Gerente extends Empleado {
    public $departamento;

    public function __construct($nombre, $salario, $departamento) {
        // Llamar al constructor de la clase padre
        parent::__construct($nombre, $salario);
        $this->departamento = $departamento;
    }

    // Sobrescribir el método mostrarInfo para agregar el departamento
    public function mostrarInfo() {
        echo "Nombre: " . $this->nombre . ", Salario: " . $this->salario . ", Departamento: " . $this->departamento . "<br>";
    }
}

// Crear una instancia de Empleado
$empleado = new Empleado("Carlos", 3000);
$empleado->mostrarInfo(); // Salida: Nombre: Carlos, Salario: 3000

// Crear una instancia de Gerente
$gerente = new Gerente("Ana", 5000, "Ventas");
$gerente->mostrarInfo(); // Salida: Nombre: Ana, Salario: 5000, Departamento: Ventas
?>

