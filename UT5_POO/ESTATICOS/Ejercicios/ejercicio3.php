<?php

    class Usuario {
        public static $contadorUsuarios = 0;
        public $nombre;

        public function __construct($nombre){
            $this->nombre = $nombre;
            self::$contadorUsuarios++;
        }

        public static function obtenerContadorUsuarios(){
            return self::$contadorUsuarios;
        }
    }

    $usuario1 = new Usuario("Carlos");
    $usuario2 = new Usuario("Coral");
    $usuario3 = new Usuario("Sara");
    $usuario4 = new Usuario("David");

    echo "Nº de usuarios creados: " .Usuario::obtenerContadorUsuarios();

?>