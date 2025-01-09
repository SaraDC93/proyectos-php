// Simula una operación asíncrona para obtener datos de usuarios
function obtenerUsuarios() {
    return new Promise((resolve) => {
        console.log("Cargando usuarios...");
        setTimeout(() => {
            resolve(["Carlos", "María", "Pedro"]);
        }, 2000);
    });
}

// Simula una operación asíncrona para obtener datos de productos
function obtenerProductos() {
    return new Promise((resolve) => {
        console.log("Cargando productos...");
        setTimeout(() => {
            resolve(["Laptop", "Celular", "Tablet"]);
        }, 1500);
    });
}

// Simula una operación asíncrona para obtener datos de pedidos
function obtenerPedidos() {
    return new Promise((resolve) => {
        console.log("Cargando pedidos...");
        setTimeout(() => {
            resolve(["Pedido 1", "Pedido 2", "Pedido 3"]);
        }, 1000);
    });
}

// Función principal para ejecutar operaciones concurrentes
async function cargarDatos() {
    try {
        console.log("Iniciando la carga de datos...");

        const [usuarios, productos, pedidos] = await Promise.all([
            obtenerUsuarios(),
            obtenerProductos(),
            obtenerPedidos(),
        ]);

        console.log("Usuarios cargados:", usuarios);
        console.log("Productos cargados:", productos);
        console.log("Pedidos cargados:", pedidos);
    } catch (error) {
        console.error("Ocurrió un error al cargar los datos:", error);
    }
}

// Ejecutar la función
cargarDatos();