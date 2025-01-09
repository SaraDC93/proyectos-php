// Simula una operación asíncrona que resuelve después de un tiempo aleatorio
function tareaRapida() {
    return new Promise((resolve) => {
        const tiempo = Math.floor(Math.random() * 5000) + 1000; // Entre 1 y 5 segundos
        console.log(`Tarea rápida (esperando ${tiempo} ms)...`);
        setTimeout(() => {
            resolve("Resultado de la tarea rápida.");
        }, tiempo);
    });
}

// Simula una operación asíncrona más lenta
function tareaLenta() {
    return new Promise((resolve) => {
        const tiempo = Math.floor(Math.random() * 5000) + 3000; // Entre 3 y 8 segundos
        console.log(`Tarea lenta (esperando ${tiempo} ms)...`);
        setTimeout(() => {
            resolve("Resultado de la tarea lenta.");
        }, tiempo);
    });
}

// Función principal para ejecutar las tareas y obtener la primera que se resuelva
async function ejecutarTareas() {
    try {
        const resultado = await Promise.race([tareaRapida(), tareaLenta()]);
        console.log("La primera tarea completada:", resultado);
    } catch (error) {
        console.error("Ocurrió un error:", error);
    }
}

// Ejecutar la función
ejecutarTareas();