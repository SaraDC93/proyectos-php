let numeros = [1, 5, 9];

function numMayor(lista) {
    let num = lista[0];
    lista.forEach(numero => {
        if(num < numero) {
            num = numero;
        }
    });
    return num;
}

console.log(numeros);