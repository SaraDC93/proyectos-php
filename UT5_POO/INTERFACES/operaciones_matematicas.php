<?php

// Definición de la interfaz 'Operaciones'
interface Operaciones {

    //metodo para sumar y restar
    public function sumar ($a, $b);
    public function restar ($a, $b);

}

//clase calculadora que implementa la interfaz operaciones
class Calculadora implements Operaciones {

    
    public function sumar ($a, $b){
        $resultado = $a + $b;
        echo "La suma de a + b es: " .$resultado;
    }

    public function restar($a, $b){
        $resultado = $a - $b;
        echo "La resta de a - b es: " .$resultado;
    }
}

$calculadora = new Calculadora();
$calculadora->sumar(30, 10);
echo "<br>";
$calculadora->restar(20, 5);

?>