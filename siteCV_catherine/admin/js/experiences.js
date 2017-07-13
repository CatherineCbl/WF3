$(function() {

    $(document).on("click", "#button_experience", function(e) {
        e.preventDefault();
        // var value = CKEDITOR.instances['#description_e'].updateElement();

        $.ajax({
            url: '/github/WF3/siteCV_catherine/admin/ajouts/ajout_experience.php',
            type: 'POST',
            data: {
                titre_e : $("#titre_e").val(),
                sous_titre_e : $("#sous_titre_e").val(),
                description_e : $("#description_e").val(),
                dates_e : $("#dates_e").val()
            }
            })
            .done(function(data){
                data = JSON.parse(data);
                //console.log(data.experience);
                $('tr').last().after(`<tr>
                    <td>`+data.titre_e+`</td>
                    <td>`+data.sous_titre_e+`</td>
                    <td>`+data.description_e+`</td>
                    <td>`+data.dates_e+`</td>
                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="experiences.php?id_experience=`+data.id_experience+`"> <span class="glyphicon glyphicon-trash"></span></a></td>
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


        if (confirm('Voulez-vous vraiment supprimer cette experience?')) {
          $.ajax({
              url: '/github/WF3/siteCV_catherine/admin/suppressions/suppression_experience.php',
              type: 'POST',
              data: {
                  experience : $(this).parent().attr('href')
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
    //$(".nb_experiences")
});
