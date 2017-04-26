
$(document).ready(function () {

    $(".validPicture").click(function () {

        // $tblEreur = new Array();
        $textInput = $("input[name='text']");

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

        // Requet ajax envoie les infos du formulaire
        $.ajax({
            url: '/web/user/create/picture',
            type: 'Get',
            async: true,
            dataType: "json",
            data: {
                "nom": $nomInput.val(),
                "style": $styleInput.val(),
                "tech": $techInput.val(),
                "genre": $genreInput.val(),
                "size": $sizeInput.val(),
                "prix": $prixInput.val(),
                "expo": $expoInput.val(),
                "comm": $commInput.val(),
                "img": $imgInput.val()
            },

            success: function () {
                
            }
        });

    });


});