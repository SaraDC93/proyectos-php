function registrarUsuario(usuario) {
    return new Promise((resolve, reject) => {
        console.log("Iniciando registro de usuario...");
        setTimeout(() => {
            const exito = Math.random() > 0.3; // 70% de probabilidad de éxito
            if (exito) {
                resolve(`El usuario ${usuario} fue registrado exitosamente.`);
            } else {
                reject(`Error: No se pudo registrar al usuario ${usuario}.`);
            }
        }, 3000); // Simulamos un retraso de 3 segundos
    });
}

// Consumir la promesa
registrarUsuario("Carlos")
    .then((mensaje) => {
        console.log(mensaje);
    })
    .catch((error) => {
        console.error(error);
    });