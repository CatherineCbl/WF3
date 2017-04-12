var zone = $(".bas");
var chat = $(".tete");
var raisons = $(".obligraisons").val().length;
var btn = $(".btn");

//La tete de chat change de couleur au survol de la zone du bas
function hover(){
    if (chat.hasClass('tetehover')) {
        chat.removeClass('tetehover');

    }
    else {
        chat.addClass('tetehover');

    }
}
//La tête de chat reprend sa couleur initiale quand on sort de la zone
function stop(){
    chat.removeClass('tetehover');
}

//affiche la zone de texte en rouge si elle ne contient pas minimum 15 caractères
function erreur(){
    event.preventDefault();
    if (raisons <15) {
        $(".obligraisons").addClass("has-error");

    }
    else{

        $(".obligraisons").removeClass("has-error");
    }
}








zone.on('mouseenter', hover);
zone.on('mouseleave', stop);
btn.on('click', erreur);
