$(function() {
    let index = 0;
    let tableauImage = ["https://sd-cdn.fr/wp-content/uploads/2017/01/Leo_Deegan_-_macro.2e16d0ba.fill-1080x1080_nDoktVK-702x336.jpg","https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT1JGXPlRRQulyeAvZEKycfKymBwKYugXDciitPhF7q7Sejp9lU"];
    let dataJson;

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

    function initText(){
        $.ajax({
            url:"https://jsonplaceholder.typicode.com/posts",
            method: "GET"
        })
        .done(function(data){
            console.log(data);
            $(".one_quarter > strong").eq(0).text(data[0].title);
            $(".one_quarter > strong").eq(1).text(data[1].title);
            $(".one_quarter > strong").eq(2).text(data[2].title);
            $(".one_quarter > strong").eq(3).text(data[3].title);

            $(".principal").eq(0).text(data[0].body.substr(0, 20) + "...");
            $(".principal").eq(1).text(data[1].body.substr(0, 20) + "...");
            $(".principal").eq(2).text(data[2].body.substr(0, 20) + "...");
            $(".principal").eq(3).text(data[3].body.substr(0, 20) + "...");

            dataJson = data;

            $(".more > a").eq(0).text("Read more >>");
            $(".more > a").eq(1).text("Read more >>");
            $(".more > a").eq(2).text("Read more >>");
            $(".more > a").eq(3).text("Read more >>");

        })
    }




    $('.more').click(function(e) {
        e.preventDefault();
        if($(this).children().text() != "Read less <<"){
            ($(this).children().text('Read less <<'))
            let text = $(this).prev().text();
            for (let a = 0; a < 4; a++) {
                if (text = dataJson[a].body.substr(0, 20) + "...") {
                    $(this).prev().text(dataJson[a].body);
                    break;
                }
            }
        }else {
            initText();
        }


    });

initText();

});
