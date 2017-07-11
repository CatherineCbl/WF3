$(function() {
    $(document).on("click", "#button_competence", function(e) {
        e.preventDefault();
        $.ajax({
            url: '/github/WF3/siteCV_catherine/admin/ajouts/ajout_competence.php',
            type: 'POST',
            data: {
                competence : $("#competence").val()
            }
            })
            .done(function(competence){
                data = JSON.parse(competence);
                //console.log(data.competence);
                $('tr').last().after(`<tr>
                    <td>`+data.competence+`</td>
                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="competences.php?id_competence=`+data.id_competence+`"> <span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>`)
        })
    });

    $('#suppression').on("click", function(e) {
        e.preventDefault();
    });

    $(document).on("click", ".glyphicon-trash", function(e) {
        let id_tr = $(this).parent().parent().parent();
        console.log(id_tr);

        if (confirm('Voulez-vous vraiment supprimer cette competence?')) {
          $.ajax({
              url: '/github/WF3/siteCV_catherine/admin/suppressions/suppression_competence.php',
              type: 'POST',
              data: {
                  competence : $(this).parent().attr('href')
              }
          })
          .done(function(data){

            $(id_tr).fadeOut('slow',function(e) {
                $(id_tr).remove();
            });
          })
        }

    })
});
