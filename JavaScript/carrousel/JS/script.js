var slides =
[
    { image: 'images/1.jpg', legend: 'Street Art'          },
    { image: 'images/2.jpg', legend: 'Fast Lane'           },
    { image: 'images/3.jpg', legend: 'Colorful Building'   },
    { image: 'images/4.jpg', legend: 'Skyscrapers'         },
    { image: 'images/5.jpg', legend: 'City by night'       },
    { image: 'images/6.jpg', legend: 'Tour Eiffel la nuit' }
];

var buttonShow = document.querySelector('#toolbar-toggle');
var carrousel = document.querySelector('nav.toolbar ul');
var eltImage = document.querySelector('img');
var state = {nb: 0, timer: null};
var buttonPrevious = document.querySelector('#slider-previous');
var buttonNext = document.querySelector('#slider-next');
var buttonRandom = document.querySelector('#slider-random');
var buttonPlay = document.querySelector('#slider-toggle');



function showToolbar(){
    carrousel.classList.toggle('hide');
    buttonShow.querySelector('i').classList.toggle('fa-arrow-right');
    buttonShow.querySelector('i').classList.toggle('fa-arrow-down');
}
function refreshSLider(){
    eltImage.src=slides[state.nb].image;
    document.querySelector('figcaption').textContent=slides[state.nb].legend;
}
function previous(){
    state.nb--;
    if (state.nb<0) {
        state.nb=5;
    }
    refreshSLider();
}
function next(){
    state.nb++;
    if (state.nb>5) {
        state.nb=0;
    }
    refreshSLider();
}
function random(){
    state.nb=getRandomInteger(0,5);
    refreshSLider();
}
function play(){
    buttonPlay.querySelector('i').classList.toggle('fa-play');
    buttonPlay.querySelector('i').classList.toggle('fa-pause');
    if (state.timer==null) {

        state.timer= setInterval(next, 1000);
    }

    else {
        clearInterval(state.timer);state.timer=null;
    }



}
function keyBoard(event){
    if (event.keyCode == 39) {next()}
    else if (event.keyCode == 37) {previous()}
    else if (event.keyCode == 32) {play()}
    else{}



}

document.addEventListener('keyup', keyBoard)


buttonShow.addEventListener('click', showToolbar);
refreshSLider();
buttonPrevious.addEventListener('click', previous);
buttonNext.addEventListener('click', next);
buttonRandom.addEventListener('click', random);
buttonPlay.addEventListener('click', play);
