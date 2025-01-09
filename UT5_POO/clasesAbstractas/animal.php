<?php
// Definir una clase abstracta
abstract class Animal {
    //declaramos atributo publico
    public $nombre;

    //constructor con parametro nombre
    public function __construct($nombre) {
        //atributo del objeto
        $this->nombre = $nombre;
    }

    // Método abstracto que debe implementarse en las clases hijas
    abstract public function hacerSonido();

    // Método concreto
    public function describir() {
        echo "Este es un animal llamado " . $this->nombre . ".<br>";
    }
}

// Clase hija Perro que implementa el método abstracto hacerSonido()
class Perro extends Animal {
    public function hacerSonido() {
        echo "Guau! Guau!<br>";
    }
}

// Clase hija Gato que implementa el método abstracto hacerSonido()
class Gato extends Animal {
    public function hacerSonido() {
        echo "Miau! Miau!<br>";
    }
}

// Crear instancias de Perro y Gato || $miperro y $migato son objetos de tipo Perro y Gato
$miPerro = new Perro("Coral");
$miGato = new Gato("Carlos");

$miPerro->describir(); // Salida: Este es un animal llamado Rex.
$miPerro->hacerSonido(); // Salida: Guau! Guau!

$miGato->describir(); // Salida: Este es un animal llamado Misu.
$miGato->hacerSonido(); // Salida: Miau! Miau!
?>