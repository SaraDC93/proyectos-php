function convertirCelsiusAFahrenheit(celsius) {
    let fahrenheit = celsius * 1.8 + 32; //Fórmula de conversión
    return fahrenheit; //Devuelve el resultado
 }
 
 //Definir el valor de la temperatura en grados Celsius (sin pedir al usuario)
let celsius = 38; // Puedes cambiar este valor por el que desees
 
 //Convertir el valor a Fahrenheit
let resultado = convertirCelsiusAFahrenheit(celsius); // Llama a la función
 console.log("La temperatura en Fahrenheit es: " + resultado + "°F"); // Mostrar el resultado