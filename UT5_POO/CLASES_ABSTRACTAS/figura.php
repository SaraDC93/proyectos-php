<?php
    //clase abstracta
    abstract class Figura {
        //metodo abstracto
        abstract public function calcularArea();

    }
    //clase cuadrado que hereda de figura
    class Cuadrado extends Figura {
        //atributo
        private $lado;
        //constructor con parametro
        public function __construct($lado){
            //atributo del objeto
            $this->lado = $lado;
        }

        //metodo 
        public function calcularArea(){
            echo "El área del cuadrado es: " .$this->lado * $this->lado ."<br>";
        }
    }
    //clase circulo que hereda de figura
    class Circulo extends Figura {
        //atributo
        private $radio;
        //constructor
        public function __construct($radio){
            //atributo del objeto
            $this->radio = $radio;
        }
        //metodo
        public function calcularArea(){
            echo "El área del circulo es: " .pi() * $this->radio * $this->radio;
        }
    }

    //instancias del objeto
    $cuadrado = new Cuadrado (7);
    $cuadrado->calcularArea();

    $circulo = new Circulo(5);
    $circulo->calcularArea();

?>