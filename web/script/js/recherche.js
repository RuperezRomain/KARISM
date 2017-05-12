/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
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
    }
//    } else if ($("#searchWhat").val() === "expos") {
//        searchExpos();
//    }
    if ($("#citiesList").val() === "city") {
        alert("Veuillez choisir une ville");
    }

});



function searchArtists() {
    i = null;
    $.ajax({
        url: URL + "artists",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                alert(data[i].city.city);
                var artist = document.createElement("div");
                artist.className = "member";

                var artistImg = document.createElement("img");
                artistImg.src = "/web/images/profilPictures/" + data[i].user_profilPicture;

                var artistURL = document.createElement("a");
                artistURL.href = URL + "profil/" + data[i].id;

                var artistName = document.createElement("h2");
                var nameText = document.createTextNode(data[i].lastname);

                var artistStyle = document.createElement("p");
                artistStyle.className = "who";
                var styleText = document.createTextNode("STYLE");

                var artistBio = document.createElement("p");
                artistBio.className = "member-text";
                var bioText = document.createTextNode(data[i].bio);


                artistURL.appendChild(artistImg);
                artist.appendChild(artistURL);
                artistName.appendChild(nameText);
                artistStyle.appendChild(styleText);
                artistBio.appendChild(bioText);
                artist.appendChild(artistName);
                artist.appendChild(artistStyle);
                artist.appendChild(artistBio);

                var selectedCity = $("#citiesList").val();
                if (data[i].city !== null) {
                    var artistCity = data[i].city.city;
                }

                if (artistCity == selectedCity) {
                    $("#results-container").append(artist);
                }
            }
        },
        error: function () {
            alert("problème");
        }
    });
}
function searchHosts() {
    $.ajax({
        url: URL + "hosts",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var host = document.createElement("div");
                host.className = "member";

                var hostImg = document.createElement("img");
                hostImg.src = "/web/images/profilPictures/" + data[i].user_profilPicture;

                var hostURL = document.createElement("a");
                hostURL.href = URL + "profil/" + data[i].id;

                var hostName = document.createElement("h2");
                var nameText = document.createTextNode(data[i].lastname);

                var hostStyle = document.createElement("p");
                hostStyle.className = "who";
                var styleText = document.createTextNode("STYLE");

                var hostBio = document.createElement("p");
                hostBio.className = "member-text";
                var bioText = document.createTextNode(data[i].bio);


                hostURL.appendChild(hostImg);
                host.appendChild(hostURL);
                hostName.appendChild(nameText);
                hostStyle.appendChild(styleText);
                hostBio.appendChild(bioText);
                host.appendChild(hostName);
                host.appendChild(hostStyle);
                host.appendChild(hostBio);

                if (data[i].city !== null) {
                    var hostCity = data[i].city.city;
                }

                var selectedCity = $("#citiesList").val();
                if (hostCity == selectedCity) {
                    $("#results-container").append(host);
                }
            }
        },
        error: function () {
            alert("problème");
        }
    });
}

function searchGuests() {
    $.ajax({
        url: URL + "guests",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                var guest = document.createElement("div");
                guest.className = "member";

                var guestImg = document.createElement("img");
                guestImg.src = "/web/images/profilPictures/" + data[i].user_profilPicture;

                var guestURL = document.createElement("a");
                guestURL.href = URL + "profil/" + data[i].id;

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
                guestStyle.appendChild(styleText);
                guestBio.appendChild(bioText);
                guest.appendChild(guestName);
                guest.appendChild(guestStyle);
                guest.appendChild(guestBio);

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
            alert("problème");
        }
    });
}

function searchPlaces() {
    $.ajax({
        url: URL + "places",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                alert(data[i].img);
//                if (data[i].img !== null && data[i].name !== null && data[i].adress !== null) {
                var place = document.createElement("div");
                place.className = "member";

                var placeImg = document.createElement("img");
                placeImg.src = "/web/images/profilPictures/" + data[i].img;

                var placeURL = document.createElement("a");
                placeURL.href = URL + "lieu/" + data[i].id;

                var placeName = document.createElement("h2");
                var nameText = document.createTextNode(data[i].name);

                var placeStyle = document.createElement("p");
                placeStyle.className = "who";
                var styleText = document.createTextNode("STYLE");

                var placeAdress = document.createElement("p");
                placeAdress.className = "member-text";
                var adressText = document.createTextNode(data[i].adress);

                placeURL.appendChild(placeImg);
                placeName.appendChild(nameText);
                placeStyle.appendChild(styleText);
                placeAdress.appendChild(adressText);
                place.appendChild(placeURL);
                place.appendChild(placeName);
                place.appendChild(placeStyle);
                place.appendChild(placeAdress);


                if (data[i].city !== null) {
                    var placeCity = data[i].city.city;
                }

                var selectedCity = $("#citiesList").val();
                if (placeCity === selectedCity) {
                    $("#results-container").append(place);

                }
//          }
            }
        },
        error: function () {
            alert("problème");
        }
    });
}


//function searchExpos() {
//    $.ajax({
//        url: URL + "expos",
//        async: true,
//        type: "GET",
//        datatype: "json",
//        success: function (data){
//        for (var i = 0; i < data.length; i++) {
//            var selectedCity = $("#citiesList").val();
//            var expoURL = document.createElement("a");
//            var linkText = document.createTextNode(data[i].lastname);
//            expoURL.appendChild(linkText);
//            expoURL.href = URL + "expo/" +data[i].id;
//            if (data[i].city !== null) {
//                    var expoCity = data[i].city.city;
//            }
//            
//            if(expoCity == selectedCity) {
//                $("#results").append(expoURL);
//            }
//        }},
//        error: function () {
//            alert("problème");
//        }
//    });
//}



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
            alert("problème");
        }
    });
}