// Simula la obtención de productos
function obtenerProductos() {
    return new Promise((resolve) => {
        console.log("Cargando productos...");
        setTimeout(() => {
            // Lista de productos simulada
            const productos = [
                { id: 1, nombre: 'Laptop', precio: 1500 },
                { id: 2, nombre: 'Teléfono', precio: 800 },
                { id: 3, nombre: 'Tablet', precio: 500 }
            ];
            resolve(productos);
        }, 1000); // Espera 1 segundo para simular una llamada asíncrona
    });
}

// Simula la búsqueda de un producto por ID
function obtenerProductoPorId(id) {
    return new Promise((resolve, reject) => {
        obtenerProductos().then((productos) => {
            // Buscar el producto por ID
            const producto = productos.find(prod => prod.id === id);
            if (producto) {
                resolve(producto); // Resuelve con el producto encontrado
            } else {
                reject(`Error: Producto con ID ${id} no encontrado.`); // Rechaza con un mensaje de error
            }
        });
    });
}

// Función principal para ejecutar el flujo
async function realizarBusquedaProducto(id) {
    try {
        const productos = await obtenerProductos(); // Obtener todos los productos
        console.log("Productos disponibles:", productos);
        
        const producto = await obtenerProductoPorId(id); // Buscar el producto por ID
        console.log("Producto encontrado:", producto);
    } catch (error) {
        console.error(error); // Manejar el error si el producto no se encuentra
    } finally {
        console.log("Operación completada."); // Mensaje final que siempre se ejecuta
    }
}

// Ejemplo de uso: Buscar un producto existente (ID 2)
realizarBusquedaProducto(2);

// Para buscar un producto que no existe, puedes usar:
realizarBusquedaProducto(5);