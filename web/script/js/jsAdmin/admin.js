var URL = "http://www.karism.fr/";

$(document).ready(function () {

    //////////////////Compteurs Home page ////////////////////////////


// Retourne le nbr de demande de new role     
    $.ajax({
        url: "./admin/get/users/request",
        type: "Get",
        dataType: "json",
        async: true,
        success: function (data) {
            $data = data;
            if ($data > 0) {
                $("#nbRequestUser").append('<span class="label label-info pull-right">' + $data + '</span>');
                $("#homeNbRequestUser").append("      " + $data);
            } else
                ($("#homeNbRequestUser").append('   0'));

        }
    });

// Retourne le nbr User     
    $.ajax({
        url: "./admin/get/users/",
        type: "Get",
        dataType: "json",
        async: true,
        success: function (data) {
            $data = data;
            if ($data > 0) {
                $("#homeNbUser").append("      " + $data);
            } else
                ($("#homeNbUser").append('   0'));

        }
    });


    // Retourne le nbr de serie validé      
    $.ajax({
        url: "./admin/get/series/",
        type: "Get",
        dataType: "json",
        async: true,
        success: function (data) {
            $data = data;
            if ($data > 0) {
                $("#homeNbSerie").append("      " + $data);
            } else
                ($("#homeNbSerie").append('   0'));

        }
    });

    // Retourne le nbr de lieux validé      
    $.ajax({
        url: "./admin/get/places/",
        type: "Get",
        dataType: "json",
        async: true,
        success: function (data) {
            $data = data;
            if ($data > 0) {
                $("#homeNbPlace").append("      " + $data);
            } else
                ($("#homeNbPlace").append('   0'));

        }
    });


    //////////////////VALIDATION////////////////////////////


    ///Apel ajax pour validation Positife demande artiste 
    $(".validArtiste").click(function () {
        $elmentCourant = $(this).parents("tr");
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
        $elmentCourant = $(this).parents("tr");
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
        $elmentCourant = $(this).parents("tr");
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
        $elmentCourant = $(this).parents("tr");
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


    $(".artiste-clickable-row").click(function () {
        window.location = $(this).data("href");
    });

    $(".hote-clickable-row").click(function () {
        window.location = $(this).data("href");
    });




//////////////////SUGGESTION////////////////////////////

    // ajax call for style suggestion
    $.ajax({
        url: URL + "suggestStyles",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data) {
            var suggestStyleList = $("#suggestStyleList");
            for (var i = 0; i < data.length; i++) {
                var suggestP = document.createElement("p");
                suggestP.className = "col-lg-3";
                var suggestName = document.createTextNode(data[i].name);
                suggestP.appendChild(suggestName);
                suggestStyleList.append(suggestP);
            }
        },
        error: function () {
            alert("problème");
        }
    });
    
    // ajax call for technique suggestion
    $.ajax({
        url: URL + "suggestTechs",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data) {
            var suggestTechList = $("#suggestTechList");
            for (var i = 0; i < data.length; i++) {
                var suggestP = document.createElement("p");
                suggestP.className = "col-lg-3";
                var suggestName = document.createTextNode(data[i].name);
                suggestP.appendChild(suggestName);
                suggestTechList.append(suggestP);
            }
        },
        error: function () {
            alert("problème");
        }
    });
    
    // ajax call for genre suggestion
    $.ajax({
        url: URL + "suggestGenres",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data) {
            var suggestGenreList = $("#suggestGenreList");
            for (var i = 0; i < data.length; i++) {
                var suggestP = document.createElement("p");
                suggestP.className = "col-lg-3";
                var suggestName = document.createTextNode(data[i].name);
                suggestP.appendChild(suggestName);
                suggestGenreList.append(suggestP);
            }
        },
        error: function () {
            alert("problème");
        }
    });
});
