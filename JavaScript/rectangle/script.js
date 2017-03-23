var button = document.querySelector('button');
var rectangle = document.querySelector('.rectangle');

function hide(){
    rectangle.classList.toggle('hide');
}
function removered(){
    rectangle.classList.remove('rouge');
}
function red(){
    rectangle.classList.add('rouge')
}

function green(){
    rectangle.classList.toggle('vert');
}

button.addEventListener('click', hide);
rectangle.addEventListener('mouseout', removered);
rectangle.addEventListener('mouseenter', red);
rectangle.addEventListener('dblclick', green);
