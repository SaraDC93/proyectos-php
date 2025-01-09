<?php

class MiClase {
    public $mensaje = "Atributo no estático";
    public static $mensajeEstatico = "Atributo estático";

    public static function accederAtributos() {
        // No puedes acceder al atributo no estático con $this
        // echo $this->mensaje;  // Error

        // Pero sí puedes acceder al atributo estático
        echo self::$mensajeEstatico;
    }
}

MiClase::accederAtributos(); // Funciona

?>