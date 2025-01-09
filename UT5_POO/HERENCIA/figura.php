<?php

    class Figura {

        public function calcularArea(){

        }
    }

    class Cuadrado extends Figura {

        private $lado;

        public function __construct($lado){
            $this->lado = $lado;
        }

        public function getLado(){
            return $this->lado;
        }

        public function setLado($lado){
            $this->lado = $lado;
            return $this;
        }

        public function calcularArea(){
           echo "El áera del cuadrado es: " . $this->lado * $this->lado ."<br>";
        }

    }

    class Circulo extends Figura {
        private $radio;

        public function __construct($radio){
            $this->radio = $radio;
        }

        public function getRadio(){
            return $this->radio;
        }

        public function setRadio($radio){
            $this->radio = $radio;
            return $this;
        }

        public function calcularArea(){
            echo "El área del círculo es: " . pi() * ($this->radio * $this->radio) . "<br>";
        }

    }

    $cuadrado = new Cuadrado(15);
    $cuadrado->calcularArea();
   
    $circulo = new Circulo(5);
    $circulo->calcularArea();

?>