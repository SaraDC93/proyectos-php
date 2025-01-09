<?php

    class Animal {
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

    public function hacerSonido(){
        echo "El $this->nombre hace un sonido<br>";
    }

 }  

 class Perro extends Animal {
    //constructor, el parent es el super en java
    public function __construct($nombre){
        parent:: __construct($nombre);
    }   

    public function hacerSonido(){
        echo "El perro $this->nombre ladra<br>";
    }

}

    $perro1 = new Perro("Fido");
    $perro1->hacerSonido();

?>