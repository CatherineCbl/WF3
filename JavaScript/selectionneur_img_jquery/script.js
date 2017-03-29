var image = $('li');
var nb = 0;


function selection(){
    if ($(this).hasClass('selected')) {
        $(this).removeClass('selected');
        nb--;

    }
    else {
        $(this).addClass('selected');
        nb++;
    }
    $('span').text(nb)
}


    image.on('click', selection);
