<?php
//Redirrecionar a otra página
//Verificación simulada de usuario y contraseña
  $usuario_correcto = true;

    if($usuario_correcto) {
        //Redirecciona a bienvenida 
        header("Location: bienvenida.php");
        exit;
    }else {
        echo "Usuario o contraseña incorrectos.";
    }
?>