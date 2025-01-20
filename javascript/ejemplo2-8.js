console.log("Inicio");
let nombre = "Juan";
let edad = 21;

if (edad <= 12) {
    console.log(nombre + " tiene " +edad+ " años, por lo que es niño");
} else if (edad >= 13 && edad <= 17) {
    console.log (nombre + " tiene " +edad+ " años, por lo que es adolescente");
} else if (edad >= 18 && edad <= 64) {
    console.log (nombre + " tiene " +edad+ " años, por lo que es trabajador");
} else {
    console.log (nombre + " tiene " +edad+ " años, por lo que es jubilado");
}