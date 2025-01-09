// Simula el inicio de sesión
function iniciarSesion(usuario) {
    return new Promise((resolve, reject) => {
        console.log("Iniciando sesión...");
        setTimeout(() => {
            if (usuario === "Carlos") {
                resolve(`Sesión iniciada para ${usuario}.`);
            } else {
                reject("Error: Usuario no encontrado.");
            }
        }, 2000);
    });
}

// Simula la obtención del perfil
function obtenerPerfil(usuario) {
    return new Promise((resolve, reject) => {
        console.log("Obteniendo perfil...");
        setTimeout(() => {
            if (usuario === "Carlos") {
                resolve({ nombre: "Carlos", rol: "Administrador" });
            } else {
                reject("Error: No se pudo obtener el perfil.");
            }
        }, 1500);
    });
}

// Simula la carga del dashboard
function cargarDashboard(rol) {
    return new Promise((resolve, reject) => {
        console.log("Cargando el dashboard...");
        setTimeout(() => {
            if (rol === "Administrador") {
                resolve("Dashboard cargado exitosamente.");
            } else {
                reject("Error: No tienes permisos para acceder al dashboard.");
            }
        }, 1000);
    });
}

// Función asíncrona con manejo de errores
async function flujoCompleto() {
    try {
        const mensajeInicio = await iniciarSesion("Carlos");
        console.log(mensajeInicio);

        const perfil = await obtenerPerfil("Carlos");
        console.log("Perfil obtenido:", perfil);

        const mensajeDashboard = await cargarDashboard(perfil.rol);
        console.log(mensajeDashboard);
    } catch (error) {
        console.error("Ocurrió un error:", error);
    }
}

// Ejecutar el flujo completo
flujoCompleto();