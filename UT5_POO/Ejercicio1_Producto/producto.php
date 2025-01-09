<?php

    class Producto {
        //atributos
        private $nombre;
        private $precio;

        //constructor
        public function __construct($nombre, $precio) {
            $this-> nombre = $nombre;
            $this-> precio = $precio;
        }

        //metodo para obtener el nombre
        public function getNombre(){
            return $this->nombre;
        }
        //metodo para cambiar el nombre
        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }

        //metodo para obtener la edad
        public function getPrecio(){
            return $this->precio;
        }
        //metodo para cambiar la edad
        public function setPrecio($precio){
            $this->precio = $precio;
             return $this;
        }

        //metodo para mostrar la info
        public function mostrarInfo() {
            echo "Nombre: " . $this->nombre . ", Precio: " . $this->precio . " €<br>";
        }
    }

    $producto1 = new Producto("Ratón", 5,50);
    $producto2 = new Producto("Teclado", 10,99);

    $producto1->mostrarInfo();
    $producto2->mostrarInfo();

?>