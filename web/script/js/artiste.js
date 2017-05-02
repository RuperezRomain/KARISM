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
                    <div class='col-lg-4'>\n\
                        <div class='widget-head-color-box navy-bg p-lg text-center'>\n\
                            <div class='m-b-md'>\n\
                            <h2 class='font-bold no-margins'>\n\
                                " + this.nom + "\n\
                            </h2>\n\
                            </div>\n\
                            <img src='/web/images/oeuvrePictures/" + this.img + "'class='img-responsive m-b-md'>\n\
                        </div>\n\
                        <div class='widget-text-box'>\n\
                           <p>" + this.commentaire + "</p>\n\
                        </div>\n\
                </div>\n\
                ");
//
            });
        }
    });

}




// <div class='text-right'>
//                          <i class='fa fa-thumbs-up'></i>" + this.style + "\n\
//                        <i class='fa fa-heart'></i> " + this.genres + "\n\
//                  </div>


// <div class='col-sm-6 col-md-4'>\n\
//                    <div class='thumbnail'>\n\
//                        <a href=''>\n\
//                            <img src='/web/images/oeuvrePictures/' + this.img + '' alt=''>\n\
//                        </a>\n\
//                        <div class='caption'>\n\
//                            <h3>" + this.nom + "</h3>\n\
//                            <h4>" + this.commentaire + "</h>\n\
//                           <div>\n\
//                                <p>" + this.style + "</p>\n\
//                                <p>" + this.genres + "</p>\n\
//                           </div>\n\
//                        </div>\n\
//                    </div>\n\
//                </div>