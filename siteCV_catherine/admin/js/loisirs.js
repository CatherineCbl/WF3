$(function() {
    $(document).on("click", "#button_loisir", function(e) {
        e.preventDefault();
        $.ajax({
            url: /*'/github/*/'WF3/siteCV_catherine/admin/ajouts/ajout_loisir.php',
            type: 'POST',
            data: {
                loisir : $("#loisir").val()
            }
            })
            .done(function(data){
                console.log(data);
                data = JSON.parse(data);
                $('tr').last().after(`<tr>
                    <td>`+data.loisir+`</td>
                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="loisirs.php?id_loisir=`+data.id_loisir+`"> <span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>`)
                $('#success_add').removeClass('hide');
                setTimeout(function(){ $('#success_add').addClass('hide'); },2000);
        })
    });
    $('td>a#suppression').on("click", function(e) {
        e.preventDefault();
    });

    $(document).on("click", ".glyphicon-trash", function(e) {
        let id_tr = $(this).parent().parent().parent();
        console.log(id_tr);

        if (confirm('Voulez-vous vraiment supprimer ce loisir?')) {
          $.ajax({
              url: '/github/WF3/siteCV_catherine/admin/suppressions/suppression_loisir.php',
              type: 'POST',
              datatype: 'html',
              data: {
                  loisir : $(this).parent().attr('href')
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
});
