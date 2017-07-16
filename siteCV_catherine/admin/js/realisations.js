$(function() {

    $(document).on("click", "#button_realisation", function(e) {
        e.preventDefault();
        // var value = CKEDITOR.instances['#description_r'].updateElement();

        $.ajax({
            url:'/WF3/siteCV_catherine/admin/ajouts/ajout_realisation.php',
            type: 'POST',
            data: {
                titre_r : $("#titre_r").val(),
                sous_titre_r : $("#sous_titre_r").val(),
                description_r : $("#description_r").val(),
                dates_r : $("#dates_r").val()
            }
            })
            .done(function(data){
                data = JSON.parse(data);
                //console.log(data.realisation);
                $('tr').last().after(`<tr>
                    <td>`+data.titre_r+`</td>
                    <td>`+data.sous_titre_r+`</td>
                    <td>`+data.description_r+`</td>
                    <td>`+data.dates_r+`</td>
                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="experiences.php?id_experience=`+data.id_realisation+`"> <span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>`);


                $('#success_add').removeClass('hide');
                setTimeout(function(){ $('#success_add').addClass('hide'); },2000);

            ;


        })
    });

    $('td>a#suppression').on("click", function(e) {
        e.preventDefault();
    });

    $(document).on("click", ".glyphicon-trash", function(e) {
        let id_tr = $(this).parent().parent().parent();


        if (confirm('Voulez-vous vraiment supprimer cette réalisation?')) {
          $.ajax({
              url: '/WF3/siteCV_catherine/admin/suppressions/suppression_realisation.php',
              type: 'POST',
              data: {
                  realisation : $(this).parent().attr('href')
              }
          })
          .done(function(data){

            $(id_tr).fadeOut('slow',function(e) {
                $(id_tr).remove();
            });
            $('#success_remove').removeClass('hide');
            setTimeout(function(){ $('#success_remove').addClass('hide'); },2000);

          })
        }

    })
    //$(".nb_realisations")
});
