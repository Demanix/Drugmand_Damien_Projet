$(document).ready(function(){

    //pour pouvoir utiliser regex
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");
    
    
    $("#form_new_client").validate({
        rules: {
            nom: "required",
            prenom: "required",
            email: "required",
            login: "required",
            password: "required",
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
    $("#form_ajout_film").validate({
        rules: {
            nom: "required",
            duree: "required",
            desc: "required",
            prix: "required",
            salle: "required",
            heure: "required",
            image: "required",
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
    $("#form_gestion_film").validate({
        rules: {
            nom: "required",
            duree: "required",
            desc: "required",
            prix: "required",
            salle: "required",
            heure: "required",
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
    $("#achat").validate({
        rules: {
            nb: "required",
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
});
