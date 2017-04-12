var elttitle = $('.title');
elttitle.find('ul').hide();


function cliquemenu() {
    $(this).find('ul').slideToggle(500);
    $(this).find('i').toggleClass('fa-arrow-circle-down');
    $(this).find('i').toggleClass('fa-arrow-circle-up');
}



elttitle.on('click',cliquemenu );
