
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
<div class='col-sm-6 col-md-4'>\n\
<div class='thumbnail'>\n\
    <a href=''>\n\
        <img src='/web/images/oeuvrePictures/"+this.img+"' alt=''>\n\
    </a>\n\
    <div class='caption'>\n\
        <h3>"+this.nom+"</h3>\n\
        <h4>"+this.commentaire+"</h>\n\
        <div>\n\
            <p>"+this.style+"</p>\n\
            <p>"+this.cgenresommentaire+"</p>\n\
        </div>\n\
    </div>\n\
    </div>\n\
</div>");
//
});
}
});
}