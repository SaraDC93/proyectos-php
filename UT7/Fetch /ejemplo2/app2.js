const url = 'https://jsonplaceholder.typicode.com/posts';
const datos = {
    title: 'foo',
    body: 'bar',
    userId: 1,
};

// Hacer la solicitud POST
fetch(url, {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json',
    },
    body: JSON.stringify(datos), // Convertir el objeto a una cadena JSON
})
.then(response => {
    if (!response.ok) {
        throw new Error('Error en la red: ' + response.status);
    }
    return response.json(); // Parsear el JSON de la respuesta
})
.then(data => {
    console.log('Datos enviados:', data); // Manejar la respuesta de la API
})
.catch(error => {
    console.error('Error:', error); // Manejar errores
});

