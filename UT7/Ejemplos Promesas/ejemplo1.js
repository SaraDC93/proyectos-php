function verificarUsuarioRegistrado(usuario) {
  return new Promise((resolve, reject) => {
      const usuariosRegistrados = ["Juan", "María", "Pedro"];
      setTimeout(() => {
          if (usuariosRegistrados.includes(usuario)) {
              resolve(`El usuario ${usuario} está registrado.`);
          } else {
              reject(`El usuario ${usuario} no está registrado.`);
          }
      }, 2000); // Simulamos un retraso de 2 segundos
  });
}

// Consumir la promesa
verificarUsuarioRegistrado("Juan")
  .then((mensaje) => {
      console.log(mensaje);
  })
  .catch((error) => {
      console.error(error);
  });

// Prueba con un usuario no registrado
verificarUsuarioRegistrado("Ana")
  .then((mensaje) => {
      console.log(mensaje);
  })
  .catch((error) => {
      console.error(error);
  });

