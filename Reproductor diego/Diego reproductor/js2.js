const btmVolumen = document.querySelector(".volumen");
const barraVolContain = document.querySelector(".volumenCont");
const volVol = document.querySelector(".volVol");
const barraProgreso = document.querySelector("#progressLine");
const song = document.querySelector("#song");
const btnPlay = document.querySelector("#btmPlay");
const btnPausa = document.querySelector("#btmPausa");
const volBar = document.querySelector("#volumenBar");
var vol=0;


volVol.addEventListener("mouseover",(e)=>{
	barraVolContain.classList.replace("volumenContainer1", "volumenContainer2");
});


volVol.addEventListener("mouseleave",(e)=>{
	barraVolContain.classList.replace("volumenContainer2", "volumenContainer1");
});


song.onloadedmetadata = function(){
	barraProgreso.max = song.duration;
	barraProgreso.value = song.currentTime;
}

btnPlay.addEventListener("click", (e)=>{
	song.play();
});

btnPausa.addEventListener("click", (e)=>{
	song.pause();
});


if(song.play()){
	setInterval(()=>{
		barraProgreso.value = song.currentTime;
	}, 500);
};


barraProgreso.onchange = function(){

	song.currentTime = barraProgreso.value;
}


volBar.onchange = function(){
	vol = this.value;
	song.volume = vol;
}

