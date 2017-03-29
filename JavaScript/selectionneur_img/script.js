var image = document.querySelectorAll('li');
var nb = 0;


function selection(){
    if (this.classList.contains('selected')) {
        this.classList.remove('selected');
        nb--;

    }
    else {
        this.classList.add('selected');
        nb++;
    }
    document.querySelector('span').textContent=(nb)
}

for (var i = 0; i < image.length; i++) {
    image[i].addEventListener('click', selection);
}
