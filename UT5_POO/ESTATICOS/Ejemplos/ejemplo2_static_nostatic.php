<?php

class MiClase {
    public $mensaje = "Soy un atributo no estático";

    public static $mensajeEstatico = "Soy un atributo estático";

    public function mostrarMensaje() {
        echo $this->mensaje; // Accede al atributo no estático
    }

    public static function mostrarMensajeEstatico() {
        echo self::$mensajeEstatico; // Accede al atributo estático
    }
}

$obj = new MiClase();
$obj->mostrarMensaje(); // Necesitas crear una instancia
MiClase::mostrarMensajeEstatico(); // No necesitas crear una instancia

?>