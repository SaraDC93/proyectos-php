<?php
//clase abstracta que no se puede implementar
abstract class Empleado {
    //atributo
    protected $nombre;

    //constructor
    public function __construct($nombre){
        //atributo del objeto
        $this->nombre = $nombre;
    }

    //metodo abstracto
    abstract public function calcularSalario();

    //metodo
    public function mostrarInfo(){
        echo "El nombre del empleado es: $this->nombre y el salario: " .$this->calcularSalario() ."<br>"; 
    }
} 

//subclase que hereda de empleado
class EmpleadoTiempoCompleto extends Empleado {


    
    //implementacion del metodo abstracto
    public function calcularSalario(){
        return 3000;
    }
}

//subclase que hereda de empleado
class EmpleadoMedioTiempo extends Empleado {

    //implementacion del metodo abstracto
    public function calcularSalario(){
        return 1500;
    }
}

$empleadoTC = new EmpleadoTiempoCompleto("Sara");
$empleadoTC->mostrarInfo();

$empleadoMT = new EmpleadoMedioTiempo("Coral");
$empleadoMT->mostrarInfo();

?>