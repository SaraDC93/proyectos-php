<?php
// Definir una clase final
final class ConexionBD {
    public function conectar() {
        echo "Conexión a la base de datos establecida.<br>";
    }
}

// Intentar heredar de la clase final (esto dará un error)
class MiConexion extends ConexionBD {
    // Código adicional
}
?>