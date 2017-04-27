
$(document).ready(function () {
    getPicture();
    $(".validPicture").click(function () {

        
        // init input Picture
        $nomInput = $("input[name='nom']");
        $styleInput = $("input[name$='style']");
        $techInput = $("input[name$='tech']");
        $genreInput = $("input[name$='genre']");
        $sizeInput = $("input[name$='size']");
        $prixInput = $("input[name$='prix']");
        $expoInput = $("input[name$='expo']");
        $commInput = $("input[name$='comm']");
        $imgInput = $("input[name$='img']");

        getPicture();


        $("#contentPicture").empty();

    });


});

function getPicture() {
/// Recuperation entity picture
    $.ajax({
        url: '/web/get/user/serie/pictures',
        type: 'Get',
        dataType: 'json',
        async: true,
        success: function ($listePic) {



            $($listePic).each(function () {



                $("#contentPicture").append("\
<div class='col-sm-4 contact-box'>\n\
        <a href=''>\n\
            <div class='col-lg-6'>\n\
                <img alt='" + this.image + "' class='img-responsive' src='/web/images/oeuvrePictures/"+this.img+"'>\n\
            </div>\n\
            <div col-lg->\n\
                <h3><strong>"+this.style+"</strong></h3><p><i class='fa fa-map-marker'></i>" + this.genres + "</p><div><br>"+this.genres+"<br>" + this.nom + "<br></div></div></div>\n\
            </div>\n\
        </a>\n\
</div>");
//
            });
        }
    });
}