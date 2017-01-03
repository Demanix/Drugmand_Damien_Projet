$(document).ready(function(){

    //pour pouvoir utiliser regex
    $.validator.addMethod("regex", function (value, element, regexpr) {
        return regexpr.test(value);
    }, "Format non valide.");
    
    
    $("#form_commande").validate({
        rules: {
            email1: "required",
            email2: {
                equalTo: "#email1"
            },
            nom: "required",
            prenom: "required",
            telephone: {
                required: true,
                regex:/^(0)[0-9]{1,2}\/[0-9]{2}\.[0-9]{2}\.[0-9]{2}$/
            },
            adresse: "required",
            numero: "required",
            codepostal: {
                required: true,
                min: 1000,
                max: 9999
            },
            localite: "required",
            submitHandler: function(form) {
                form.submit();
            }
        }
    });
    
});
