let rowCount = $('table tr').length - 1;

$(function() {

    $(document).on("click", "#button_formation", function(e) {
        e.preventDefault();
        $.ajax({
            url: '/WF3/siteCV_catherine/admin/ajouts/ajout_formation.php',
            type: 'POST',
            data: {
                titre_f : $("#titre_f").val(),
                sous_titre_f : $("#sous_titre_f").val(),
                description_f : $("#description_f").val(),
                dates_f : $("#dates_f").val()
            }
            })
            .done(function(formation){
                data = JSON.parse(formation);
                //console.log(data.formation);
                $('tr').last().after(`<tr>
                    <td>`+data.titre_f+`</td>
                    <td>`+data.sous_titre_f+`</td>
                    <td>`+data.description_f+`</td>
                    <td>`+data.dates_f+`</td>
                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="formations.php?id_formation=`+data.id_formation+`"> <span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>`)
                $('#success_add').removeClass('hide');
                setTimeout(function(){ $('#success_add').addClass('hide'); },2000);


        })
        rowCount = $('table tr').length;
        $('em#count').html(rowCount);
    });

    $('td>a#suppression').on("click", function(e) {
        e.preventDefault();
    });

    $(document).on("click", ".glyphicon-trash", function(e) {
        let id_tr = $(this).parent().parent().parent();
        console.log(id_tr);

        if (confirm('Voulez-vous vraiment supprimer cette formation?')) {
          $.ajax({
              url: '/WF3/siteCV_catherine/admin/suppressions/suppression_formation.php',
              type: 'POST',
              data: {
                  formation : $(this).parent().attr('href')
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
        rowCount = $('table tr').length;
        $('em#count').html(rowCount);

    })
});
