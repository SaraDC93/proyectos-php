<?php

class CalculadoraGeometrica {
    const PI = 3.14159;

    public static function calcularAreaCirculo($radio) {
        return self::PI * pow($radio, 2);
    }

    public static function calcularAreaRectangulo($base, $altura) {
        return $base * $altura;
    }
}

$circulo = CalculadoraGeometrica::calcularAreaCirculo(5);
$rectangulo = CalculadoraGeometrica::calcularAreaRectangulo(4, 6);

echo "Área del círculo: " .$circulo. "<br>";
echo "Área del rectángulo: " .$rectangulo. "<br>";

?>