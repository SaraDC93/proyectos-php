<?php

    class Empleado {
        protected $nombre;

        public function __construct($nombre){
            $this->nombre = $nombre;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }

        public function calcularSalario() {
            return 1000;
        }

        public function mostrarInformacion(){
            echo "Nombre: $this->nombre y salario: " .$this->calcularSalario() . "<br>";
        }
     }

     class EmpleadoTiempoCompleto extends Empleado {

        public function calcularSalario(){
            return parent::calcularSalario() * 1.5; //al ser un método de la clase padre , se usa parent
        }
     }

     class EmpleadoMedioTiempo extends Empleado {

        public function calcularSalario(){
            return parent::calcularSalario() / 2; //al ser un método de la clase padre , se usa parent
        }
     }

     $empleado = new Empleado ("Carlos");
     $empleado->mostrarInformacion();

     $empleadoTiempoCompleto = new EmpleadoTiempoCompleto("Juan");
     $empleadoTiempoCompleto->mostrarInformacion();

     $empleadoMedioTiempo = new EmpleadoMedioTiempo("Pedro");
     $empleadoMedioTiempo->mostrarInformacion();

?>