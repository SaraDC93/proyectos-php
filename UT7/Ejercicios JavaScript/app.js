// Selección de elementos del DOM
const taskInput = document.getElementById('task-input');
const addTaskButton = document.getElementById('add-task-button');
const taskList = document.getElementById('task-list');

// Función para agregar una nueva tarea
function addTask() {
  const taskText = taskInput.value.trim();
  if (taskText === '') {
    alert('Por favor, escribe una tarea.');
    return;
  }

  // Crear un elemento de lista para la nueva tarea
  const taskItem = document.createElement('li');
  taskItem.textContent = taskText;

  // Botón para marcar como completado
  const completeButton = document.createElement('button');
  completeButton.textContent = 'Completar';
  completeButton.addEventListener('click', () => {
    taskItem.classList.toggle('completed');
  });

  // Botón para eliminar la tarea
  const deleteButton = document.createElement('button');
  deleteButton.textContent = 'Eliminar';
  deleteButton.addEventListener('click', () => {
    taskList.removeChild(taskItem);
  });

  // Añadir los botones al elemento de lista
  taskItem.appendChild(completeButton);
  taskItem.appendChild(deleteButton);

  // Agregar la tarea a la lista
  taskList.appendChild(taskItem);

  // Limpiar el campo de entrada
  taskInput.value = '';
}

// Evento para el botón de agregar tarea
addTaskButton.addEventListener('click', addTask);

// Evento para agregar tarea presionando Enter
taskInput.addEventListener('keypress', (e) => {
  if (e.key === 'Enter') {
    addTask();
  }
});
