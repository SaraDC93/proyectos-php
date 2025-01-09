<?php
session_start(); //con esto iniciamos la sesion


//isset comprueba si la variable de inicio de sesion (agenda)esta definida, si no lo esta, la inicia como un array vacio
if (!isset($_SESSION['agenda'])) {
    $_SESSION['agenda'] = []; 
}


//verificamos que la solicitud enviada es de tipo post y si es así, nos recupera los datos enviados al formulario (nombre y telefono)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = ($_POST['nombre']);
    $telefono = ($_POST['telefono']);
    
    //con empty comprobamos si nombre esta vacio, y si lo esta manda un mensaje de advertencia
    if (empty($nombre)) {
        $mensaje = "El nombre no puede estar vacío.";
    } else {
        //esto verifica si el nombre existe como una clave en el array 
        if (array_key_exists($nombre, $_SESSION['agenda'])) {
            if (empty($telefono)) {

                // Si no indicamos número, elimina el contacto y manda un mensaje de confirmacion
                unset($_SESSION['agenda'][$nombre]);
                $mensaje = "Contacto '$nombre' eliminado de la agenda.";
            } else {
                // Si se ha indicado el número, lo actualiza y manda un mensaje de confirmacion
                $_SESSION['agenda'][$nombre] = $telefono;
                $mensaje = "Número de teléfono de '$nombre' actualizado.";
            }

        } else {
            //verifica que el numero de telefono proporcionado no este vacio
            if (!empty($telefono)) {

                // Si no existe, añadimos el nuevo contacto
                $_SESSION['agenda'][$nombre] = $telefono;
                $mensaje = "Contacto '$nombre' añadido a la agenda.";

                //sale un mensaje de advertencia si no se ha introducido un numero de telefono
            } else {
                $mensaje = "Debes introducir un número de teléfono para añadir el contacto.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agenda de Contactos</title>

    <style>
        body { font-family: Arial, sans-serif;
            background-color: #d1f2eb;}
        .alert { color:indigo; }
    </style>
</head>
<body>
    <h1>Agenda de Contactos</h1>
    <div>
        <?php if (isset($mensaje)) { echo "<p class='alert'>$mensaje</p>"; } ?>
        <ul>
            <?php
            // Mostrar la agenda
            foreach ($_SESSION['agenda'] as $nombre => $telefono) {
                echo "<li>$nombre: $telefono</li>";
            }
            ?>
        </ul>
    </div>
            <br />
    <h2>Añadir/Modificar/Eliminar Contacto</h2>
    <form method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>
        <br>
        <label for="telefono">Número de Teléfono:</label>
        <input type="text" id="telefono" name="telefono">
        <br>
        <button type="submit">Guardar</button>
    </form>
</body>
</html>