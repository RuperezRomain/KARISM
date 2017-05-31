$(".removeSerie").click(function () {
    var id = $(this).closest("div").prop("id");
    swal({
        title: "Voulez-vous vraiment supprimer cette série ?",
        text: "Ceci est une action irréversible",
        type: "warning",
        showCancelButton: true,
        showLoaderOnConfirm: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, je veux la supprimer !",
        closeOnConfirm: false
    },
            function () {
                swal("Série supprimée", "Votre série a bien était supprimée", "success");
            });
    $('.confirm').click(function () {
//                    alert(id);
        setTimeout(function () {
            window.location.replace("/artiste/remove/serie/" + id);
        }, 2500);
    });
});

$(".removePlace").click(function () {
    
    var id = $(this).closest("div").prop("id");
    alert(id);
    swal({
        title: "Voulez-vous vraiment supprimer ce lieu ?",
        text: "Ceci est une action irréversible",
        type: "warning",
        showCancelButton: true,
        showLoaderOnConfirm: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Oui, je veux le supprimer !",
        closeOnConfirm: false
    },
            function () {
                swal("Lieu supprimée", "Votre lieu a bien était supprimé", "success");
            });
    $('.confirm').click(function () {
                    
        setTimeout(function () {
            window.location.replace("/hote/remove/place/" + id);
        }, 2500);
    });
});