//Simula la obtención de libros
function obtenerLibros(){
    return new Promise((resolve) => {
        console.log("Cargando los libros...");
        setTimeout(() => {
            //Lista de libros simulada
            const libros = [
                { id: 1, nombre: "El Principito", autor: "Antoine de Saint-Exupéry" },
                { id: 2, nombre: "Cien años de soledad", autor: "Gabriel García Márquez" },
                { id: 3, nombre: "1984", autor: "George Orwell" }
              ];
              resolve(libros);
        }, 1000); //Devuelve una lista de libros después de 1 segundo.
    });
}
//simula la busqueda de un libro por ID
function buscarLibroPorId(id){
    return new Promise((resolve, reject) => {
        obtenerLibros().then((libros) => {
            //Buscar el libro por su id
            const libros = libros.find(libr => libr.id === id);
            if (libros) {
                resolve(libros); //Resuelve con el libro encontrado
            }else {
                    eject(`Error: Producto con ID ${id} no encontrado.`);
            }
        }, 1500);
    });
} 

