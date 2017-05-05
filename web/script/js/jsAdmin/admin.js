$(document).ready(function (){
    
    
        $(".validArtiste").click(function () {
$elmentCourant =  $(this).parents("tr");
        $idUser = $elmentCourant.attr('id');
        $.ajax({
            url: "./remote/user/" + $idUser + "/artiste/valid",
            type: "Get",
            dataType: "json",
            async: true,
            success: function () {
                $elmentCourant.css({
                    'display': 'none'
                });
            }
        });
    });
    

///Apel ajax pour validation Négative demande artiste 
    $(".refuseArtiste").click(function () {
$elmentCourant =  $(this).parents("tr");
        $idUser = $elmentCourant.attr('id');
        $.ajax({
            url: "./remote/user/" + $idUser + "/artiste/refuse",
            type: "Get",
            dataType: "json",
            async: true,
            success: function () {
                $elmentCourant.css({
                    'display': 'none'
                });
            }
        });
    });
                
                

    $(".validHote").click(function () {
$elmentCourant =  $(this).parents("tr");
        $idUser = $elmentCourant.attr('id');
        $.ajax({
            url: "./remote/user/" + $idUser + "/hote/valid",
            type: "Get",
            dataType: "json",
            async: true,
            success: function () {
                $elmentCourant.css({
                    'display': 'none'
                });
            }
        });
    });
    

///Apel ajax pour validation Négative Hote
    $(".refuseHote").click(function () {
$elmentCourant =  $(this).parents("tr");
        $idUser = $elmentCourant.attr('id');
        $.ajax({
            url: "./remote/user/" + $idUser + "/hote/refuse",
            type: "Get",
            dataType: "json",
            async: true,
            success: function () {
                $elmentCourant.css({
                    'display': 'none'
                });
            }
        });
    });

});