
var seriesCheckbox = $('input[name=cheeck]');
var valideListe = $('#validSerieExpo');
var listeIdSerieTempAjax = [];
var listeIdSerieTemp = [];
var boutonSelectHote =  $('input[name=selectHote]');

////// Validation message hote 

boutonSelectHote.click(function () {
    $("#choixHoteExpo").css({
        
    });
       
});


valideListe.click(function () {

    for (var i = 0; i < listeIdSerieTemp.length; i++) {
        if (listeIdSerieTemp[i] !== undefined) {
            listeIdSerieTempAjax.push(listeIdSerieTemp[i]);
        }
    }

    $.ajax({
        url: '/edit/expo/serie',
        type: 'get',
        data: {"listeId": listeIdSerieTempAjax },
        dataType: "json",
              success: function (){
            
        }
    });




});

seriesCheckbox.click(function () {

    if ($(this).prop("checked")) {
        listeIdSerieTemp.push($(this).attr("id"));
        // alert(listeIdSerieTemp);
    } else {
        var i = 0;
        while (i < listeIdSerieTemp.length) {
            if (listeIdSerieTemp[i] === $(this).attr("id")) {
                delete listeIdSerieTemp[i];
                break;
            }
            i++;
        }
    }


});

