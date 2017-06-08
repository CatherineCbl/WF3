$.ajax({
        url: "MikeLeBoss.php",
        method: "POST",
        data: { marque: $("#marque").val(), modele: $("#modele").val(), annee: $("#annee"), nb_porte: $("#nb_porte").val(), couleur: $("#couleur").val(), nb_place: $("#nb_place").val() }
    })
    .done(function(data){

        dialog("voiture ajoutée");
    })
