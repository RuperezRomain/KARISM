$("#join").click(function () {
    var expoId = $(this).closest("div").prop("id");
    swal({
        title: "Voulez-vous vraiment participer à cette exposition ?",
        text: "Vous pourrez toujours revenir sur votre décision en accédant à votre gestionnaire d'invitations",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#0F335C",
        confirmButtonText: "Oui, je veux y aller !",
        closeOnConfirm: false
    },
            function () {
                swal("Bravo ! :)", "Vous êtes désormais dans la liste des invités", "success");
                $('.confirm').click(function () {
                    joinExpo(expoId);
                    location.reload();
                });
            });
});


function joinExpo(id) {
    $.ajax({
        url: "/join/expo/" + id,
        type: "POST",
        dataType: "text",
        async: true,
        success: function () {
        }
    }
    );
}