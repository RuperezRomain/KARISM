//       Recuperation input formulaire
var nomInput = $("input[name='appbundle_picture[nom]']");
var styleInput = $("input[name$='appbundle_picture[style]']");
var techInput = $("input[name$='appbundle_picture[techniques]']");
var genreInput = $("input[name$='appbundle_picture[genres]']");
var sizeInput = $("input[name$='appbundle_picture[size]']");
var prixInput = $("input[name$='appbundle_picture[prix]']");
var expoInput = $("input[name$='appbundle_picture[expos]']");
var commInput = $("input[name$='appbundle_picture[commentaire]']");
var imgInput = $("input[name$='appbundle_picture[img]']");

$(document).ready(function () {

    getPicture();

    $(".validPicture").click(function () {
        getPicture();
        $("#contentPicture").empty();
    });

    $("#exitSerie").click(function () {

        $.ajax({
            url: '/web/delete/cache/pictures',
            type: 'Get',
            dataType: 'json',
            async: true,
            success: function () {}

        });

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
            //Supretion champ formulaire
            nomInput.val('');
            styleInput.val('');
            techInput.val('');
            techInput.val('');
            sizeInput.val('');
            prixInput.val('');
            expoInput.val('');
            commInput.val('');
            imgInput.val('');
            $($listePic).each(function () {
                //Parce mes object picture
                $("#contentPicture").append("\
                <div class='col-sm-6 col-md-4'>\n\
                    <div class='thumbnail'>\n\
                        <a href=''>\n\
                            <img src='/web/images/oeuvrePictures/" + this.img + "' alt=''>\n\
                        </a>\n\
                        <div class='caption'>\n\
                            <h3>" + this.nom + "</h3>\n\
                            <h4>" + this.commentaire + "</h>\n\
                            <div>\n\
                                <p>" + this.style + "</p>\n\
                                <p>" + this.genres + "</p>\n\
                            </div>\n\
                        </div>\n\
                    </div>\n\
                </div>");
//
            });
        }
    });

}