const volume = document.querySelector(".volume");
const barraVolContain = document.querySelector(".volumeCont");
const barraProgreso = document.querySelector("#progressLine");
const song = document.querySelector("#song");
const btnPlay = document.querySelector("#play");
const btnPausa = document.querySelector("#pause");
const volBar = document.querySelector("#volumenBar");
let vol = 0;

volume.addEventListener("mouseover", () => {
    barraVolContain.classList.replace("volumeCont", "volumenContainer2");
});

volume.addEventListener("mouseleave", () => {
    barraVolContain.classList.replace("volumenContainer2", "volumeCont");
});

song.addEventListener("loadedmetadata", () => {
    barraProgreso.max = song.duration;
    barraProgreso.value = song.currentTime;
});

btnPlay.addEventListener("click", () => {
    song.play();
});

btnPausa.addEventListener("click", () => {
    song.pause();
});

song.addEventListener("play", () => {
    setInterval(() => {
        barraProgreso.value = song.currentTime;
    }, 500);
});

barraProgreso.oninput = () => {
    song.currentTime = barraProgreso.value;
};

volBar.oninput = () => {
    vol = volBar.value;
    song.volume = vol;
};