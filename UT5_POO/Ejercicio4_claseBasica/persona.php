<?php

    class Persona {
        //ATRIBUTO protegido para poder acceder desde la clase hija
        protected $nombre;
        //CONSTRUCTOR
        public function __construct($nombre){
            $this->nombre = $nombre;
        }
        //MÉTODO
        public final function identificar(){
            echo "Esta persona es: $this->nombre";
        }
    }

    class Empleado extends Persona {
        private $puesto;
        //CONSTRUCTOR LLAMANDO AL PARENT QUE ES EL ATRIBUTO DE LA CLASE PADRE
        public function __construct($nombre, $puesto){
            parent::__construct($nombre);
            $this->puesto = $puesto;
        }
        
        /*public function identificar(){
            parent::identificar();
        }*/
        //los metodos final no se pueden sobreescribir

    }

    //INSTANCIA
    $persona = new Persona ("Sara");
    $persona->identificar();
  

?>