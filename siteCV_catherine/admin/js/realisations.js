$(function() {
    $(document).on("click", "#button_realisation", function(e) {
        e.preventDefault();
        $.ajax({
            url: '/github/WF3/siteCV_catherine/admin/ajouts/ajout_realisation.php',
            type: 'POST',
            data: {
                realisation : $("#realisation").val()
            }
            })
            .done(function(realisation){
                data = JSON.parse(realisation);
                //console.log(data.realisation);
                $('tr').last().after(`<tr>
                    <td>`+data.realisation+`</td>
                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="realisations.php?id_realisation=`+data.id_realisation+`"> <span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>`)
        })
    });

    $('td>a').on("click", function(e) {
        e.preventDefault();
    });

    $(document).on("click", ".glyphicon-trash", function(e) {
        let id_tr = $(this).parent().parent().parent();
        console.log(id_tr);

        if (confirm('Voulez-vous vraiment supprimer cette realisation?')) {
          $.ajax({
              url: '/github/WF3/siteCV_catherine/admin/suppressions/suppression_realisation.php',
              type: 'POST',
              data: {
                  realisation : $(this).parent().attr('href')
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
