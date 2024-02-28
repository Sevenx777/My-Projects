function calcularPesoIdeal() {
    const altura = parseFloat(document.getElementById('altura').value);
    const edad = parseInt(document.getElementById('edad').value);
    const sexo = document.getElementById('sexo').value;
    const pesoActual = parseFloat(document.getElementById('peso').value);
    let imc;
    let pesoIdeal;
    if (sexo === 'hombre') {
        imc = pesoActual / (altura + altura);
        pesoIdeal = pesoActual - imc * ((altura - 150) / 4);
    } else {
        imc = pesoActual / (altura + altura);
        pesoIdeal = pesoActual - imc * ((altura - 150) / 2.5);
    }

    const resultadoElement = document.getElementById("resultado");
    if (edad <= 0 || altura <= 0 || pesoActual <= 0) {
        resultadoElement.innerHTML = "Por favor, ingresa valores válidos.";
    } else {
        resultadoElement.innerHTML = "Tu peso ideal aproximado es de " + pesoIdeal.toFixed(2) + " kg.";
    }
}

function reset() {
    document.getElementById('calculatorForm').reset();
    document.getElementById('resultado').innerHTML = '';
}
