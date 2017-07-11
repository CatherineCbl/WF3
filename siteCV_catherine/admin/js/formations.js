$(function() {
    $(document).on("click", "#button_formation", function(e) {
        e.preventDefault();
        $.ajax({
            url: '/github/WF3/siteCV_catherine/admin/ajouts/ajout_formation.php',
            type: 'POST',
            data: {
                formation : $("#formation").val()
            }
            })
            .done(function(formation){
                data = JSON.parse(formation);
                //console.log(data.formation);
                $('tr').last().after(`<tr>
                    <td>`+data.formation+`</td>
                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="formations.php?id_formation=`+data.id_formation+`"> <span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>`)
        })
    });

    $('td>a').on("click", function(e) {
        e.preventDefault();
    });

    $(document).on("click", ".glyphicon-trash", function(e) {
        let id_tr = $(this).parent().parent().parent();
        console.log(id_tr);

        if (confirm('Voulez-vous vraiment supprimer cette formation?')) {
          $.ajax({
              url: '/github/WF3/siteCV_catherine/admin/suppressions/suppression_formation.php',
              type: 'POST',
              data: {
                  formation : $(this).parent().attr('href')
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
