var URL = "http://www.karism.fr/";

$().ready(function () {
    getCities();
});

$("#searchBtn").click(function () {
    $("#results-container").empty();
    if ($("#searchWhat").val() === "artist") {
        searchArtists();
    } else if ($("#searchWhat").val() === "host") {
        searchHosts();
    } else if ($("#searchWhat").val() === "guest") {
        searchGuests();
    } else if ($("#searchWhat").val() === "place") {
        searchPlaces();
    } else if ($("#searchWhat").val() === "expo") {
        searchExpos();
    }
//    } else if ($("#searchWhat").val() === "expos") {
//        searchExpos();
//    }
    if ($("#citiesList").val() === "city") {
//        alert("Veuillez choisir une ville");
    }

});

function inviteUser(id) {
    $.ajax({
        url: "/expo/invite/user/" + id,
        type: 'POST',
        dataType: 'text',
        async: true,
        success: function (data) {
            if (data === "ok"){
            swal("Invitation envoyée", "", "success");
        }else{
            swal("Invitation déjà envoyé", "", "error");
        }
        }
    }
    );
}
;


function searchGuests() {
    $.ajax({
        url: URL + "guests",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {

                var id = data[i].id;

                var guest = document.createElement("div");
                guest.className = "member col-xs-12 col-sm-4 col-md-3 col-lg-2";
                
                var guestImg = document.createElement("img");
                guestImg.src = "/web/images/profilPictures/" + data[i].user_profilPicture;

                var guestURL = document.createElement("a");
                guestURL.href = URL + "profil/" + data[i].id;

                var guestURLInvite = document.createElement("a");
//                guestURLInvite.href = "/expo/invite/user/" + data[i].id;
                guestURLInvite.className = "btn btn-warning btn-outline btn-block fixBot";
                guestURLInvite.setAttribute("id", "invitation");


                var buttonText = document.createTextNode("Envoyer une invitation");

                var guestName = document.createElement("h2");
                var nameText = document.createTextNode(data[i].lastname);

                var guestStyle = document.createElement("p");
                guestStyle.className = "who";
                var styleText = document.createTextNode("STYLE");

                var guestBio = document.createElement("p");
                guestBio.className = "member-text";
                var bioText = document.createTextNode(data[i].bio);

                guestURL.appendChild(guestImg);
                guest.appendChild(guestURL);
                guestName.appendChild(nameText);
//                guestStyle.appendChild(styleText);
//                guestBio.appendChild(bioText);
                guestURLInvite.appendChild(buttonText);
                guest.appendChild(guestName);
//                guest.appendChild(guestStyle);
//                guest.appendChild(guestBio);
                guest.appendChild(guestURLInvite);

                $(guestURLInvite).click(function () {
                    inviteUser(id);
                });

                if (data[i].city !== null) {
                    var guestCity = data[i].city.city;
                }

                var selectedCity = $("#citiesList").val();
                if (guestCity == selectedCity) {
                    $("#results-container").append(guest);
                }
            }
        },
        error: function () {
        }
    });

}

function getCities() {
    $.ajax({
        url: URL + "cities",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data) {
            var citiesList = $("#citiesList");
            $("#citiesList").append('<option value= city>Ville</option>');
            for (var i = 0; i < data.length; i++) {
                var citiesOptions = document.createElement("option");
                var cityName = document.createTextNode(data[i].city);
                citiesOptions.appendChild(cityName);
                citiesList.append(citiesOptions);
            }
        },
        error: function () {
        }
    });
}