/*
*
*VARIABLES
*
*/
/*
*
*FUNCTIONS & EVENTS
*
*/
$('.btnsubmit').on('click', function() {
    event.preventDefault();
    var nom = $('#oblignom').val();
    if (nom === "") {
        $('#oblignom').closest('div.form-group').addClass('has-error');
    }
});
