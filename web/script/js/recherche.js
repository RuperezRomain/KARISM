/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var URL = "http://www.karism.fr/";
var CONTENT = $("#content");


$().ready(function () {
    getCities();
});


$("#searchBtn").click(function () {
    $("#results").empty();
    if($("#searchWhat").val() === "artist"){
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
    $i = null;
    $.ajax({
        url: URL + "artists",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data){
        for (var $i = 0; $i < data.length; $i++) {
            var selectedCity = $("#citiesList").val();
            var artistURL = document.createElement("a");
            var linkText = document.createTextNode(data[$i].lastname);
            artistURL.appendChild(linkText);
            artistURL.href = URL + "profil/" +data[$i].id;
            var artistCity = data[$i].city.city;
            
            if(artistCity == selectedCity) {
                $("#results").append(artistURL);
            }
        }},
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
        success: function (data){
        for (var $i = 0; $i < data.length; $i++) {
            var selectedCity = $("#citiesList").val();
            var hostURL = document.createElement("a");
            var linkText = document.createTextNode(data[$i].lastname);
            hostURL.appendChild(linkText);
            hostURL.href = URL + "profil/" +data[$i].id;
            var hostCity = data[$i].city.city;
            
            if(hostCity == selectedCity) {
                $("#results").append(hostURL);
            }
        }},
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
        success: function (data){
        for (var $i = 0; $i < data.length; $i++) {
            var selectedCity = $("#citiesList").val();
            var guestURL = document.createElement("a");
            var linkText = document.createTextNode(data[$i].lastname);
            guestURL.appendChild(linkText);
            guestURL.href = URL + "profil/" +data[$i].id;
            var guestCity = data[$i].city.city;
            
            if(guestCity == selectedCity) {
                $("#results").append(guestURL);
            }
        }},
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
        success: function (data){
        for (var $i = 0; $i < data.length; $i++) {
            console.log(data);
            var selectedCity = $("#citiesList").val();
            var placeURL = document.createElement("a");
//            var placeImg = document.createElement("img");
//            placeImg.src = "/web/images/placePictures/{{place.img}}";
            var linkText = document.createTextNode(data[$i].name);
            placeURL.appendChild(linkText);
            placeURL.href = URL + "lieu/" +data[$i].id;
                if (data[$i].city !== null) {
                var placeCity = data[$i].city.city;
                }
            if(placeCity == selectedCity) {
                $("#results").append(placeURL);
            }
        }},
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
//        for (var $i = 0; $i < data.length; $i++) {
//            var selectedCity = $("#citiesList").val();
//            var expoURL = document.createElement("a");
//            var linkText = document.createTextNode(data[$i].lastname);
//            expoURL.appendChild(linkText);
//            expoURL.href = URL + "expo/" +data[$i].id;
//            var expoCity = data[$i].city.city;
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
        success: function (data){
            var citiesList = $("#citiesList");
            $("#citiesList").append('<option value= city>Ville</option>');
        for (var $i = 0; $i < data.length; $i++) {
            var citiesOptions = document.createElement("option");
            var cityName = document.createTextNode(data[$i].city);
            citiesOptions.appendChild(cityName);
            citiesList.append(citiesOptions);
        }},
        error: function () {
            alert("problème");
        }
    });
}