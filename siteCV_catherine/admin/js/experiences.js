$(function() {
    $(document).on("click", "#button_experience", function(e) {
        e.preventDefault();
        $.ajax({
            url: '/github/WF3/siteCV_catherine/admin/ajouts/ajout_experience.php',
            type: 'POST',
            data: {
                experience : $("#experience").val()
            }
            })
            .done(function(experience){
                data = JSON.parse(experience);
                //console.log(data.experience);
                $('tr').last().after(`<tr>
                    <td>`+data.experience+`</td>
                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="experiences.php?id_experience=`+data.id_experience+`"> <span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>`)
        })
    });

    $('td>a').on("click", function(e) {
        e.preventDefault();
    });

    $(document).on("click", ".glyphicon-trash", function(e) {
        let id_tr = $(this).parent().parent().parent();
        console.log(id_tr);

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
          })
        }

    })
});
