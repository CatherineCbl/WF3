$(function(){
    $("form").submit(function(e) {//fonction necessitant la soumission, la validation du formulaire
            e.preventDefault();
            $.ajax({
                url: "exo3.php",//url où la connexion a la BDD se fait
                method: "POST",
                data: {
                    marque: $("#marque").val(),
                    modele: $("#modele").val(),
                    annee: $("#annee").val(),
                    couleur: $("#couleur").val(),
                }
            })
            .done(function() {
                $("#message").html('<div class="alert alert-success"><strong>Success!</strong> Véhicule ajouté.</div>');//message de réussite si succès de l'ajax
            })
            .fail(function() {
                $("#message").html('<div class="alert alert-danger"><strong>Danger!</strong> Véhicule non ajouté. Problème serveur.</div>');//message d'erreur dans le cas contraire
            });
    });
})
