// Simula una operación que puede fallar aleatoriamente
function operacionConFallo() {
    return new Promise((resolve, reject) => {
        const exito = Math.random() > 0.5; // 50% de probabilidad de éxito
        console.log("Ejecutando operación...");
        setTimeout(() => {
            if (exito) {
                resolve("Operación exitosa.");
            } else {
                reject("Error: La operación falló.");
            }
        }, 1000);
    });
}

// Función para reintentar la operación
async function reintentarOperacion(maxIntentos) {
    for (let intento = 1; intento <= maxIntentos; intento++) {
        try {
            const resultado = await operacionConFallo();
            console.log(resultado);
            return; // Salir de la función si tiene éxito
        } catch (error) {
            console.error(error);
            if (intento < maxIntentos) {
                console.log(`Reintentando (${intento}/${maxIntentos})...`);
            } else {
                console.log("No se pudo completar la operación después de varios intentos.");
            }
        }
    }
}

// Ejecutar la función de reintento
reintentarOperacion(5);