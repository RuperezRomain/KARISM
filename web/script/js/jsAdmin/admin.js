$(document).ready(function (){
    
 //////////////////VALIDATION////////////////////////////
 
// Popep

    
    
    
    
    
    $.ajax({
            url: "./admin/get/users/request",
            type: "Get",
            dataType: "json",
            async: true,
            success: function (data) {
                $data = data ;
                if ($data > 0){
                    $("#nbRequestUser").append('<span id="nbRequestUser" class="label label-info pull-right">'+ $data +'</span>');
                }
            }
        });
    
    
    
    
    
    
    
    
    
    
    
    
  //////////////////VALIDATION////////////////////////////
  
  
  ///Apel ajax pour validation Positife demande artiste 
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
                
                
  ///Apel ajax pour validation Positife demande Hote 
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