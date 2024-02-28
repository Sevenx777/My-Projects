const secuenciaInput = document.getElementById("secuenciaInput");
const botonA = document.getElementById("botonA");
const botonB = document.getElementById("botonB");
const botonAB = document.getElementById("botonAB");
const resetBoton = document.getElementById("resetBoton");
const output = document.getElementById("output");

let contar = 0;
let numero = 0;
let suma = 0;
let promedio = 0;

botonA.addEventListener("click", function () {
    const numeroIngresado = parseInt(secuenciaInput.value);
    //esto es el limitador que hace que no se trabe jerry ya que pone un limitador
    if (numeroIngresado >= 1 && numeroIngresado <= 100) {
        contar = numeroIngresado;
        suma = 0;
        numero = 0;
        output.innerHTML = "";
        for (let index = 0; index < contar; index++) {
            numero = numero + 2;
            output.innerHTML += "<br>" + numero;
            suma += numero;
        }
    } else {
        output.innerHTML = "Por favor ingrese un número válido";
    }
}); 

secuenciaInput.addEventListener("keydown", function (e) {
     const numeroIngresado = parseInt(secuenciaInput.value + e.key);

    if (numeroIngresado > 100 || isNaN(numeroIngresado)) {
        e.preventDefault();
     }
});

botonB.addEventListener("click", function () {
    if (contar > 0) {
        output.innerHTML = "Suma: " + suma;
    } else {
        output.innerHTML = "No se ha generado la secuencia aún.";
    }
});

botonAB.addEventListener("click", function () {
    if (contar > 0) {
        promedio = suma / contar;
        output.innerHTML = "Promedio: " + promedio;
    } else {
        output.innerHTML = "No se ha generado la secuencia aún.";
    }
});

resetBoton.addEventListener("click", function () {
    secuenciaInput.value = "";
    contar = 0;
    numero = 0;
    suma = 0;
    promedio = 0;
    output.innerHTML = "";
});
