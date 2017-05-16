var URL = "http://www.karism.fr/";

$().ready(function () {
    getSuggestionTypes();
});
$("#validSuggest").click(function () {
    if ($("#suggestType").val() === "suggestion") {
        alert("veuillez choisir un type de suggestion");
    } else if ($("#suggestName").val() == "") {
        alert("veuillez écrire une suggestion");
    } else {
        var suggestion = {
            "name": $("#suggestName").val(),
            "categorie": $("#suggestType").val()
        };
        addSuggestion(suggestion);
        ;
        
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
            $("#suggestType").append('<option>suggestion</option>');
            $("#suggestType").append('<option disabled></option>');
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

function addSuggestion(suggestion) {
    $.ajax({
            url: URL + "suggestion",
            async: true,
            type: "POST",
            datatype: "json",
            data: suggestion,
            success: function (suggestion) {
                alert("Merci pour votre suggestion");
            },
            error: function () {
                alert("merde");
            }
        });
}