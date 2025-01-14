// URL de la API
const url = 'https://jsonplaceholder.typicode.com/posts';
// Hacer la solicitud GET
fetch(url)
    .then(response => {
        // Verificar si la respuesta fue exitosa
        if (!response.ok) {
            throw new Error('Error en la red: ' + response.status);
        }
        return response.json(); // Parsear el JSON de la respuesta
    })
    .then(data => {
        console.log(data); // Manejar los datos recibidos
    })
    .catch(error => {
        console.error('Error:', error); // Manejar errores
    });