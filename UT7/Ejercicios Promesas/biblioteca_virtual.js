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
//Simula la busqueda de un libro por ID
function buscarLibroPorId(id){
    return new Promise((resolve, reject) => {
        obtenerLibros().then((libros) => {
            //Buscar el libro por su id
            const libro = libros.find(l => l.id === id);
            if (libros) {
                resolve(libro); //Resuelve con el libro encontrado
            }else {
                    reject(`Error: Producto con ID ${id} no encontrado.`);
            }
        }, 1500);
    });
} 

function agregarLibro(nuevoLibro){
    return new Promise((resolve, reject) => {
        setTimeout(() => {
            if (nuevoLibro.id && nuevoLibro.nombre) {
                libros.push(nuevoLibro); //Agrega el nuevo libro a la lista
                resolve(nuevoLibro);
            }else {
                reject("El libro no cuenta con un campo obligatorio (id o nombre)");
            }
        }, 2000);
    }); 
}

console.log("Obteniendo lista de libros...");
obtenerLibros()
    .then((lista) => {
        console.log("Lista de libros disponibles:");
        console.log(lista);
    })

    console.log("Buscando libro con ID 2...");
    buscarLibroPorId(2)
        .then((busqueda) => {
            console.log("Libro encontrado:");
            console.log(busqueda);
        })

