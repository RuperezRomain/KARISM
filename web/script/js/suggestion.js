var URL = "http://www.karism.fr/";

$().ready(function () {
    getSuggestionTypes();
});
$("#validSuggest").click(function () {
    if ($("#suggestType").val() === "suggestion" || $("#suggestType").val() === ""){
        alert("veuillez choisir un type de suggestion");
    } else {
        var suggestion = {
            "name": $("#suggestionName").val(),
            "categorie": $("#suggestType").val()
        };
        alert(suggestion.categorie);
        $.ajax({
        url: URL + "suggestion",
        async: true,
        type: "POST",
        datatype: "json",
        data: suggestion,
        success: function(suggestion) {
            alert("OK");
        },
        error: function(){
            alert("merde");
        }
    });
//        addSuggestion(suggestion);
    }
});

function getSuggestionTypes() {
    $.ajax({
        url: URL + "suggestTypes",
        async: true,
        type: "GET",
        datatype: "json",
        success: function (data) {
            var suggestTypes = $("#suggestType");
            $("#suggestType").append('<option >suggestion</option>');
            $("#suggestType").append('<option ></option>');
            for (var i = 0; i < data.length; i++) {
                var typeOptions = document.createElement("option");
                var typeName = document.createTextNode(data[i].name);
                typeOptions.appendChild(typeName);
                suggestTypes.append(typeOptions);
            }
        },
        error: function () {
            alert("problème");
        }
    });
}

//function addSuggestion(suggestion) {
//    $.ajax({
//        url: URL + "suggestion",
//        async: true,
//        type: "POST",
//        datatype: "json",
//        data: suggestion,
//        success: function(suggestion) {
//            alert("OK");
//        },
//        error: function(){
//            alert("merde");
//        }
//    });
//}
