let treeHeight = 7; // Altura inicial del árbol
const tree = document.getElementById('tree');
let lightsOn = false; // Variable para rastrear si las luces están encendidas o apagadas

// Función para agrandar el tamñaño del arbol jerry ejmplo le pongo 40 y en el html se multiplica por 5 creo abajo esta la formula mirala
function resizeTree() {
    const userInput = prompt('Introduce la nueva altura del árbol:');
    const newHeight = parseInt(userInput);
    if (!isNaN(newHeight) && newHeight > 0) {
        treeHeight = newHeight;
        buildTree();
    } else {
        alert('Por favor, introduce un número válido mayor que 0.');
    }
}

// Función para reiniciar el árbol
function resetTree() {
    treeHeight = 7; // aca esta fijado la altura bot xd
    buildTree();
}

// Función para activar los colores aca es lo del boton que viste
function toggleLights() {
    lightsOn = true;
    changeLights();
}

// Función para apgar
function turnOffLights() {
    lightsOn = false;
    changeLights();
}

function changeLights() { // Funcion para la animcaion de colores no fui capaz de quefueran muchos colores pense en asignas una clase a cada capa y asi se podrian ver de diferentes colores pero me dio pereza y me traBE
    const ornaments = document.querySelectorAll('.sphere');
    const colors = ['blue', 'green', 'orangered', 'yellow'];

    ornaments.forEach((ornament) => {
        if (lightsOn) {
            const randomColor = colors[Math.floor(Math.random() * colors.length)];
            ornament.style.color = randomColor;
            ornament.style.animation = 'changeColor 2.5s infinite';
        } else {
            ornament.style.animation = "none";
            ornament.style.color = 'black';
        }
    });
}



// Función para hace el arbol aca estan las ramas se multiplican por 2 luego le resto pero es exponencial como viste las capas van a umentando 
function buildTree() {
    tree.innerHTML = ''; // Limpiar el contenido anterior

    // Crear la estrella 
    const star = document.createElement('div');
    star.classList.add('star');
    star.textContent = '★';
    tree.appendChild(star);

    // Construir las capas del árbol
    for (let i = 1; i <= treeHeight; i++) {
        const layer = document.createElement('div');
        for (let j = 1; j <= i * 2 - 1; j++) {
            const ornament = document.createElement('span');
            ornament.classList.add('ornament');
            ornament.textContent = '^';
            layer.appendChild(ornament);

            // Agregar esferas de colores alternando lados (aca fue donde te pedi ayuda ajajja)
            if (j % 2 === 0 && j !== i) {
                const sphere = document.createElement('span');
                sphere.classList.add('sphere'); // Agregar una clase para las esferas
                sphere.textContent = 'o';
                layer.appendChild(sphere);
                sphere.style.fontSize = 20 + i * 5 + 'px'; // Aumentar el tamaño de las esferas aca esta por 5 las esferas son una o podria haber puesto un emoji pero ñe o crear un icono pero ñe me dio pereza
            }
        }
        tree.appendChild(layer);
    }

    // Crear el tronco del árbol con alto y ancho aumentados (aca fue cuando me dijiste que el tornco no solo debia ser alto si no ancho y pues ya lo arrgele modificando su alto y ancho)
    const trunk = document.createElement('div');
    trunk.classList.add('trunk');
    trunk.style.width = treeHeight * 5 + 'px'; // Aumentar el ancho del tronco
    trunk.style.height = treeHeight * 10 + 'px'; // Aumentar el alto del tronco
    tree.appendChild(trunk);
}

// Construir el árbol
buildTree();
