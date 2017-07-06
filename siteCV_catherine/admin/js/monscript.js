$(function() {
    $(document).on("click", "#button_loisir", function(e) {
        e.preventDefault();
        $.ajax({
            url: '/github/WF3/siteCV_catherine/admin/ajout.php',
            type: 'POST',
            data: {
                loisir : $("#loisir").val()
            }
            })
            .done(function(data){
                data = JSON.parse(data);
                console.log(data.loisir);
                $('tr').last().after(`<tr>
                    <td>`+data.loisir+`</td>
                    <td><a href="#"><span class="glyphicon glyphicon-pencil"></span></a></td>
                    <td><a href="loisirs.php?id_loisir=`+data.id_loisir+`"> <span class="glyphicon glyphicon-trash"></span></a></td>
                </tr>`)
        })
    });
    $(document).on("click", $this".glyphicon-trash", function(e) {
        e.preventDefault();
        $.ajax({
            url: '/github/WF3/siteCV_catherine/admin/suppression.php',
            type: 'POST',
            data: {
                loisir : $("#loisir").val()
            }
        })
    })
});
