
var seriesCheckbox = $('input[name=cheeck]');
var valideListe = $('#validSerieExpo');
var listeIdSerieTempAjax = [];
var listeIdSerieTemp = [];



valideListe.click(function () {

    for (var i = 0; i < listeIdSerieTemp.length; i++) {
        if (listeIdSerieTemp[i] !== undefined) {
            listeIdSerieTempAjax.push(listeIdSerieTemp[i]);
        }
    }

    $.ajax({
        url: '',
        type: 'get',
        data: {"mail": listeIdSerieTempAjax },
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

