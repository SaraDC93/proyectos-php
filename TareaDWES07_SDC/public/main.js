const apiUrl = '/api/'; // Ruta base para los endpoints de la API

// Elementos del DOM
const registerForm = document.getElementById('registerForm');
const loginForm = document.getElementById('loginForm');
const bookForm = document.getElementById('bookForm');
const booksContainer = document.getElementById('booksContainer');
const authSection = document.getElementById('auth');
const booksSection = document.getElementById('books');
const logoutButton = document.getElementById('logoutButton');

// Manejo de Registro
registerForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    const response = await fetch(apiUrl + 'register.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ name, email, password }),
    });

    const result = await response.json();
    alert(result.message || result.error);
});

// Manejo de Inicio de Sesión
loginForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;

    const response = await fetch(apiUrl + 'login.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ email, password }),
    });

    const result = await response.json();
    console.log(result);
    if (result.userId) {
            localStorage.setItem('userId', result.userId); // Almacena el ID de usuario
    }else{
        console.log("Usuario no encontrado");
    }
    if (result.message) {
        alert(result.message);
        toggleSections(true); // Mostrar sección de libros
        loadbooks(); // Cargar libros del usuario
    } else {
        alert(result.error);
    }
});

// Manejo de Cierre de Sesión
logoutButton.addEventListener('click', async () => {
    const response = await fetch(apiUrl + 'logout.php', { method: 'POST' });
    const result = await response.json();
    alert(result.message || result.error);
    toggleSections(false); // Volver a mostrar la sección de autenticación
});

// Crear Libro
bookForm.addEventListener('submit', async (event) => {
    event.preventDefault();
    const title = document.getElementById('bookTitle').value;
    const author = document.getElementById('bookAuthor').value;
    const due_date = document.getElementById('bookDueDate').value;

    const response = await fetch(apiUrl + '/api/books.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ title, author, due_date }),
    });

    const result = await response.json();
    alert(result.message || result.error);
    loadBooks(); // Recargar los libros
});

// Cargar Libros
async function loadBooks() {
    const response = await fetch(apiUrl + 'books.php');
    const books = await response.json();

    // Limpiar el contenedor de libros
    booksContainer.innerHTML = '';

    if (books.error) {
        booksContainer.innerHTML = '<li>Error al cargar los libros.</li>';
        return;
    }

    // Renderizar libros
    books.forEach(book => {
        const li = document.createElement('li');
        li.innerHTML = `
            <strong>${book.title}</strong> - ${book.due_date} 
            [${book.status}]
            <button onclick="updateBook(${book.id}, '${book.status === 'Pendiente' ? 'Realizada' : 'Pendiente'}')">
                Marcar como ${book.status === 'Pendiente' ? 'Realizada' : 'Pendiente'}
            </button>
            <button onclick="deleteBook(${book.id})">Eliminar</button>
        `;
        booksContainer.appendChild(li);
    });
}

// Actualizar Estado de un libro
async function updateBook(id, status) {
    const response = await fetch(apiUrl + 'books.php', {
        method: 'PUT',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id, status }),
    });

    const result = await response.json();
    alert(result.message || result.error);
    loadBooks(); // Recargar los libros
}

// Eliminar un Libro
async function deleteBook(id) {
    const response = await fetch(apiUrl + 'books.php', {
        method: 'DELETE',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify({ id }),
    });

    const result = await response.json();
    alert(result.message || result.error);
    loadBooks(); // Recargar los libros
}

// Alternar entre las secciones de autenticación y libros
function toggleSections(isLoggedIn) {
    if (isLoggedIn) {
        authSection.style.display = 'none';
        booksSection.style.display = 'block';
    } else {
        authSection.style.display = 'block';
        booksSection.style.display = 'none';
    }
}

// Inicialización
toggleSections(false); // Mostrar sección de autenticación al cargar la página
