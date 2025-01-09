<?php

abstract class Empleado {
    protected $nombre;
    protected $salarioBase;

    public function __construct($nombre, $salarioBase){
        $this->nombre = $nombre;
        $this->salarioBase = $salarioBase;
    }

    abstract public function calcularSalarioTotal();

    public function mostrarInfo(){
        echo "El nombre del empleado es: $this->nombre y el salario: " .$this->calcularSalarioTotal() ."<br>"; 
    }
} 

class EmpleadoBase extends Empleado {

    public function calcularSalarioTotal(){
        return $this->salarioBase;
    }
}

//clase que hereda de empleado
class EmpleadoConBonificacion extends Empleado {
    //atributo
    private $bonificacion;

    //costructor que añade los parametros/atributos del padre
    public function __construct($nombre, $salarioBase, $bonificacion){
        parent::__construct($nombre, $salarioBase);
        $this->bonificacion = $bonificacion; 
    }

    //implementacion del metodo abstracto de la clase padre
    public function calcularSalarioTotal(){
        return $this->salarioBase + $this->bonificacion;
    }
}

$empleadoB = new EmpleadoBase("Coral", 1000);
$empleadoB->calcularSalarioTotal();
$empleadoB->mostrarInfo();

$empleadoCB = new EmpleadoConBonificacion("Sara", 1000, 500);
$empleadoCB->calcularSalarioTotal();
$empleadoCB->mostrarInfo();
?>