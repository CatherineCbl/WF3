$(function(){
    $("form").submit(function(e) {
            e.preventDefault();
            console.log($("#nb_porte").val());
            $.ajax({
                url: "class.php",
                method: "POST",
                data: {
                    marque: $("#marque").val(),
                    modele: $("#modele").val(),
                    annee: $("#annee").val(),
                    couleur: $("#couleur").val(),
                    nb_porte: $("[name=nb_porte]:checked").val(),
                    nb_place: $("#nb_place").val(),
                }
            })
            .done(function() {
                $("#message").html('<div class="alert alert-success"><strong>Success!</strong> Véhicule ajouté.</div>');
            })
            .fail(function() {
                $("#message").html('<div class="alert alert-danger"><strong>Danger!</strong> Véhicule non ajouté. Problème serveur.</div>');
            });
    });
})
