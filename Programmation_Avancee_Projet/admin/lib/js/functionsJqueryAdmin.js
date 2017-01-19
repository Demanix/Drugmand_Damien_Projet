$(document).ready(function () {
    $("#nom").blur(function () {
        nom = $("#nom").val();
        if ($.trim(nom) !== '') {
            recherche = "nom=" + nom;
            $.ajax({
                type: 'GET',
                data: recherche,
                dataType: "json",
                url: './lib/php/ajax/AjaxAjoutFilm.php',
                success: function (data) {
                    $("#duree").val(data[0].duree);
                    $("#desc").val(data[0].description);
                    $("#prix").val(data[0].prix);
                }
            });
        }
    });
});