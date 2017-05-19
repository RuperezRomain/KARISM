var URL = "http://www.karism.fr/";

$().ready(function () {
});

$(".acceptInvite").click(function () {
    var expoId = $(this).closest("tr").prop("id");

    swal("Invitation acceptée :)", "Vous pouvez toujours annuler en cas d'indisponibilité", "success");
    acceptInvite(expoId);
    $('.confirm').click (function(){
    location.reload();
    });
});

$(".declineInvite").click(function () {

    var expoId = $(this).closest("tr").prop("id");
alert(expoId);
    swal("Invitation refusée :(", "Vous pouvez toujours revenir sur votre décision", "warning");
    declineInvite(expoId);
    $('.confirm').click (function(){
    location.reload();
    });
});

$(".switchInvite").click(function () {

    var expoId = $(this).closest("tr").prop("id");

    swal("");
    switchInvite(expoId);
        $('.confirm').click (function(){
    location.reload();
    });

});

function acceptInvite(id) {
    $.ajax({
        url: "/expo/" + id + "/invite/accept",
        type: 'POST',
        dataType: 'text',
        async: true,
        success: function () {
        }
    }
    );
}
;
function declineInvite(id) {
    $.ajax({
        url: "/expo/" + id + "/invite/decline",
        type: 'POST',
        dataType: 'text',
        async: true,
        success: function () {
        }
    });
};

function switchInvite(id) {
    $.ajax({
        url: "/expo/" + id + "/invite/switch",
        type: 'POST',
        dataType: 'text',
        async: true,
        success: function (data) {
            if (data === "switch to 2") {
                swal("Invitation refusée :(", "Vous pouvez toujours revenir sur votre décision", "warning");
            }else if (data === "switch to 1"){
            swal("Invitation acceptée :)", "Vous pouvez toujours annuler en cas d'indisponibilité", "success");
        }
        }
    });
};