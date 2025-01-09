<?php

    class Producto {
        private $nombre;
        private $precio;
        private $cantidad;

        public function __construct($nombre, $precio, $cantidad) {
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->cantidad = $cantidad;
        }

        public function mostrarInfo() {
            echo "El nombre del producto es: {$this->nombre} tiene un precio de: {$this->precio} y en una cantidad de: {$this->cantidad} <br>";
        }
    }

    $producto = new Producto("PC", 200, 4);

    $cadenaSerializada = serialize($producto);
    echo "Objeto serializado: " . $cadenaSerializada. "<br>";

    $usuarioDeserializado = unserialize($cadenaSerializada);
    $usuarioDeserializado->mostrarInfo();
    
?>