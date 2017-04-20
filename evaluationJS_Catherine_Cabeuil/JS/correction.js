$(function(){
    /*
    *
    *VARIABLES
    *
    */
    var choixChat = $('#choice');
    var raisonAdoption = $('#reason');
    var errors = false;

    //Soumission du formulaire
    $('#requestCat').on('submit', function(e){
        e.preventDefault();//on empeche l'envoi du formulaire
        //on vérifie la longueur de la valeur séléctionnée dans la liste déroulante <select>
        //Les classes .has-error et .has-success proviennent de bootstrap et doivent être appliquées dur la classe parente ici, .form-group
        if(choixChat.val().length == 0){
            choixChat.parent().addClass('has-error');
            errors = true;
        }
        else{
            choixChat.parent().addClass('has-success');
        }
        //on vérifie la longueur du textarea (minimum 15 caractères)
        if(raisonAdoption.val().length < 15){
            raisonAdoption.parent().addClass('has-error');
            errors = true;
        }
        else{
            raisonAdoption.parent().addClass('has-success');
        }
        // BONUS - validation formulaire
        if(errors === false){
            $(this).replaceWith('<div class="alert alert-success">Votre demande a bien été envoyée! Nous vous répondrons dans les meilleurs délais.</div>');
        }
    })

    // on retire les classes .has-error ou .has-success dès que les champs changent (sans rechargement de la page)
    choixChat.on('change', function(e){
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    })
    raisonAdoption.on('change', function(e){
        $(this).parent().removeClass('has-success has-error');
        errors = false;
    })
})
