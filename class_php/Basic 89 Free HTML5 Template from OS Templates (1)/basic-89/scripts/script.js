$(function() {
    let index = 0;
    let tableauImage = ["https://sd-cdn.fr/wp-content/uploads/2017/01/Leo_Deegan_-_macro.2e16d0ba.fill-1080x1080_nDoktVK-702x336.jpg","https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1JGXPlRRQulyeAvZEKycfKymBwKYugXDciitPhF7q7Sejp9lU"];

    setInterval(function(){
        $("#img_replace").attr("src", tableauImage[index]);
        index++;
        if (index == tableauImage.length) {
            index = 0;
        }
    },3000 );

$('#slider').click(function() {
    event.preventDefault();
    $('#img_replace').attr('src',"https://sd-cdn.fr/wp-content/uploads/2017/01/Leo_Deegan_-_macro.2e16d0ba.fill-1080x1080_nDoktVK-702x336.jpg");

});
// $('.one_third').on('click', function() {
//     event.preventDefault();
//     let id = $(this).children().attr('id');
//     let source;
//     if (id == "img1") {
//         source = "http://www.gruporbm.com/gallery/sitioenconstruccion.jpg ";
//     }
//     else if (id == "img2") {
//         source = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1JGXPlRRQulyeAvZEKycfKymBwKYugXDciitPhF7q7Sejp9lU";
//     }
//     else {
//         source = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQqGPMCgDQ-aR65Tpfj66cEe-nIraY-wykyhe5FRGQmd-n9dt14";
//     }
//     $(this).children().attr('src',source);
//
// });
$('.one_third').click(function() {
    let source;
    let img1 = $('#img1').attr('src');
    let img2 = $('#img2').attr('src');
    let img3 = $('#img3').attr('src');
    source = img1
    $('#img1').attr('src', img3);
    $('#img3').attr('src', img2);
    $('#img2').attr('src', source);

});

$('.more').click(function(e) {
    e.preventDefault();
    $(this).hide();
    // let txt = $(this).prev().text();
    // $(this).prev().text(txt+"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin egestas ex, at maximus tortor consequat ac. Aenean ac fermentum lorem, eu blandit sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce rhoncus ut augue eget efficitur. Ut dignissim dui vel felis maximus, sed sagittis justo vestibulum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed orci tellus, scelerisque sed ex eu, ultricies tristique dolor. Proin sit amet condimentum massa, id convallis mi. Fusce ut pharetra ante. Nulla facilisi. Sed vel malesuada diam, eget consequat lacus. Integer ultricies faucibus tortor, eu ullamcorper libero tincidunt at. Proin felis tellus, tristique sit amet rhoncus sed, mollis non ipsum.");    OU
    $(this).prev().append("Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc sollicitudin egestas ex, at maximus tortor consequat ac. Aenean ac fermentum lorem, eu blandit sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce rhoncus ut augue eget efficitur. Ut dignissim dui vel felis maximus, sed sagittis justo vestibulum. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed orci tellus, scelerisque sed ex eu, ultricies tristique dolor. Proin sit amet condimentum massa, id convallis mi. Fusce ut pharetra ante. Nulla facilisi. Sed vel malesuada diam, eget consequat lacus. Integer ultricies faucibus tortor, eu ullamcorper libero tincidunt at. Proin felis tellus, tristique sit amet rhoncus sed, mollis non ipsum.").
});
});
