$(function() {

    let idSelect;

    // Evenement changement de valeur du select
    $("#id").change(function() {
        idSelect = $("#id").val(); // Recuperation de la valeur du select
        if (idSelect == "null") { // Verifie que l'utilisateur à bien selectionner un element de la liste
            $("#modif_title").val("");
            $("#modif_picture").val("");
            $("#modif_description").val("");
        } else {
            $.ajax({
                    url: "api.php",
                    method: "POST",
                    data: { id_post: idSelect, type: "Select" } // Il correspond au "name" d'un formulaire. Côté php - $_POST["id_post"] aura la valeur de idSelect
                })
                .done(function(data) {
                    data = JSON.parse(data);
                    $("#modif_title").val(data[0].title);
                    $("#modif_picture").val(data[0].picture);
                    $("#modif_description").val(data[0].description);
                    // $("#modif_category_id option[value='" + data[0].category_id + "']").remove();
                    // $("#modif_category_id").append('<option value="' + data[0].category_id + '" >Selectionnez</option>');

                }); // Done = SUCCESS de l'ajax;
        }
    });

    $("#form_modif_post").submit(function(e) {
        e.preventDefault();
        console.log(idSelect);
        $.ajax({
            url: "api.php",
            method: "GET",
            data: {
                title: $("#modif_title").val(),
                picture: $("#modif_picture").val(),
                description: $("#modif_description").val(),
                category_id: $("#modif_category_id").val(),
                id_post: idSelect,
                type: "Update"
            }
        });
    });

    $("#form_supprim_post").submit(function(e) {
        e.preventDefault();
        idSelect = $("#id_supprim").val();
        console.log(idSelect);
        $.ajax({
            url: "api.php",
            method: "POST",
            data: {
                id_post: idSelect,
                type: "Delete"
            }
        });
    });
});
