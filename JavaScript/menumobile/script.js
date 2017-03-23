var button = document.querySelector('button');
var menu_panel = document.querySelector('#menu-panel');


function animationbouton(){
    button.classList.toggle('is-active');
    if (button.classList.contains('is-active')) {
        menu_panel.classList.add('show');
    }
    else {
        menu_panel.classList.remove('show');
    }
}


button.addEventListener('click', animationbouton);
