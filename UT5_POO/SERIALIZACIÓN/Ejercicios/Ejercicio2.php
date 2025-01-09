<?php
/*Crea un sistema simple de carrito de compras usando serialización.

Define una clase Carrito que contenga una propiedad productos como un array para almacenar instancias de la clase Producto.
Crea métodos agregarProducto(Producto $producto) para añadir productos al carrito y mostrarCarrito() para mostrar los productos en el carrito.
Serializa el objeto Carrito para simular el almacenamiento del carrito.
Deserializa el carrito y muestra los productos almacenados.*/ 
    class Carrito {
         private $productos = [];

         public function __construct($productos){
            $this->productos = $productos;
         }

         public function agregarProducto(Producto $producto){
            $this->productos[] = $producto;
         }

         public function mostrarCarrito(){
            if (empty($this->productos)) {
                echo "El carrito está vacío.\n";
                return;
            }
    
            echo "Productos en el carrito:\n";
            foreach ($this->productos as $producto) {
                echo "- " . $producto->nombre . " (Precio: $" . $producto->precio . ")\n";
            }
         }
    }

// Crear instancias de productos
$producto1 = new Producto("Camiseta", 20.99);
$producto2 = new Producto("Pantalón", 35.50);
$producto3 = new Producto("Zapatillas", 60.00);

// Crear una instancia de carrito
$carrito = new Carrito();
$carrito->agregarProducto($producto1);
$carrito->agregarProducto($producto2);
$carrito->agregarProducto($producto3);

// Mostrar el carrito antes de serializar
echo "Antes de serializar:\n";
$carrito->mostrarCarrito();

// Serializar el objeto Carrito
$carrito_serializado = serialize($carrito);

// Guardar el carrito serializado en un archivo (simulando almacenamiento)
file_put_contents("carrito_serializado.txt", $carrito_serializado);

// Leer el carrito desde el archivo y deserializarlo
$carrito_recuperado_serializado = file_get_contents("carrito_serializado.txt");
$carrito_recuperado = unserialize($carrito_recuperado_serializado);

// Mostrar el carrito después de deserializar
echo "\nDespués de deserializar:\n";
$carrito_recuperado->mostrarCarrito();

?>