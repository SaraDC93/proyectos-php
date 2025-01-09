<?php
//definición de la interfaz
interface Forma {
    
    public function calcularArea();
    public function calcularPerimetro();

}

//clase
class Rectangulo implements Forma {
    //atributos
    private $ancho;
    private $alto;

    //constructor
    public function __construct($ancho, $alto){
        $this->ancho = $ancho;
        $this->alto = $alto;
    }

    //implementacion del metodo calcularArea
    public function calcularPerimetro(){
        echo "El perimetro del rectangulo es: " . 2 * ($this->ancho + $this->alto). "<br>";
    }

    public function calcularArea(){
        echo "El área del rectangulo es: " . $this->alto * $this->ancho. "<br>";
    }
}

//clase
class Circulo implements Forma {
    //atributos
    private $radio;

    //constructor
    public function __construct($radio) {
        $this->radio = $radio;
    }

    //implementacion
    public function calcularArea(){  
        echo "El area del circulo es: " .pi() * pow($this->radio, 2). "<br>";
    }

    public function calcularPerimetro(){
        echo "El perímetro del círculo es: " . 2 * pi() * $this->radio;
    }
}

//instancia de rectangulo y circulo
$rectangulo = new Rectangulo(10, 5);
$rectangulo->calcularPerimetro();
$rectangulo->calcularArea();

$circulo = new Circulo(20);
$circulo->calcularArea();
$circulo->calcularPerimetro();

?>