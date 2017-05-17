var userId = $("#userId").parent().attr("id");
var id = $("#addWish").parent().attr("id");


$(document).ready(function () {
    checkWish(id);
        getWishNbrArtiste(id);


    $("#addWish").click(function () {
        addInWish(id);
        getWishNbrArtiste(id);
        checkWish(id);
    });


$("#deleteWishlisted").click(function (){
    deleteWishlistArtiste(id);
        getWishNbrArtiste(id);
    checkWish(id);
});
});

function addInWish(id) {
/// Recuperation entity picture
    $.ajax({
        url: '/add/wish/' + id,
        type: 'POST',
        dataType: 'text',
        async: true,
        success: function () {

        }
    }
    );
}
;


function checkWish(id) {
    $.ajax({
        url: "/check/wish/" + id,
        type: "GET",
        dataType: "text",
        async: true,
        success: function (data) {
            if (data === "Tu peux ajouter cet artiste") {
//                $("#addWish").addClass("btn btn-block btn-danger dim btn-outline");
//                $("#addWish").removeClass("btn btn-block btn-outline btn-primary");
//                $("#addWish").text("");
//                $("#addWish").append("<i class='fa fa-star '></i> " + "L'artiste est dans ta wishlist");
                $("#deleteWishlisted").empty();
                $("#isWishlisted").text("");               
                $("#isWishlisted").addClass("hidden");
                $("#addWish").removeClass("hidden");
                $("#addWish").addClass("btn btn-block btn-danger dim btn-outline");
                $("#addWish").text("");               
                $("#addWish").append("<i class='fa fa-star'></i>" + " Ajouter en favori");               
                $("#addWish").attr("id","addWish");
            } else {
                flag = false;
                $("#addWish").addClass("hidden");
                $("#isWishlisted").append("<i class='fa fa-star '></i> " + "L'artiste est dans ta wishlist");
                $("#isWishlisted").removeClass("hidden");
                $("#isWishlisted").addClass("btn btn-block btn-outline btn-primary");
                $("#deleteWishlisted").append("<button id='deleteWishlisted' class='btn btn-block btn-outline btn-warning' type='button'><i class='fa fa-trash'></i> Supprimer l'artiste de ma wishlist</button>");
                return data;
            }
        }
    });
}

function getWish(id) {
    $.ajax({
        url: "/get/wishlist/" + id,
        type: "GET",
        dataType: "json",
        async: true,
        success: function (data) {
            alert(id);
        }
    });
}

// Retourne le nbr de fois que l'artiste a été wishlisté    
function getWishNbrArtiste(id) {
$.ajax({
    url: "/get/wish/nbr/artiste/" + id,
    type: "GET",
    dataType: "json",
    async: false,
    success: function (data) {
        $data = data;
        if ($data > 0) {
            $("#countWishlisted").text("Cet artiste a été wishlisté " + $data + " fois");
        }else if ($data === 0){
           $("#countWishlisted").empty(); 
        }

    }
});}

// Retourne le nbr d'artiste dans la wishlist de l'user ciblé   

$.ajax({
    url: "/get/wish/nbr/usermain/" + id,
    type: "GET",
    dataType: "json",
    async: false,
    success: function (data) {
        $data = data;
        if ($data > 0) {
            $("#countInWishlist").append(" (" + $data + ")");
        }

    }
});

function deleteWishlistArtiste(id) {
$.ajax({
    url: "/delete/wish/artiste/" + id,
    type: "DELETE",
    async: true,
    success: function (data) {
        }
    }
);};




