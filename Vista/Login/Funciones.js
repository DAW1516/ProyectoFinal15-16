$(document).ready(function(){

    $("[name='loginForm']").validetta({
        display: 'inline',
        errorTemplateClass: 'validetta-inline',
        realTime: true,
        validators: {
            regExp: {
                validarDni : {
                    pattern : /^\d{8}[a-zA-Z]$/,
                    errorMessage : 'DNI no válido'
                }
            }
        },
        onValid: function(e){
            e.preventDefault();

            //Encriptar contraseña a md5
            var password = hex_md5($('#password').val());
            var dni = $('#usuario').val();

            //Creamos el objeto JSON para pasarselo a PHP
            var json = {dni: dni, password: password};
            var jsonString = JSON.stringify(json);

            //Enviamos el JSON por post a PHP para trabajar con el
            $.post("http://192.168.33.10/ProyectoFinal15-16-Desarrollo/Controlador/Login/Router.php?cod=1", {login: jsonString}, function(respuesta){
                $('#datos').html(respuesta).css("display","block");
            });
        }
    });

    $("[name='changePasswordForm']").validetta({
        display: 'inline',
        errorTemplateClass: 'validetta-inline',
        realTime: true,
        onValid: function(e){
            e.preventDefault();

            //Encriptamos contraseñas
            var oldpassword = hex_md5($('#oldpassword').val());
            var newpassword = hex_md5($('#newpassword').val());
            var repassword = hex_md5($('#repassword').val());

            //Creamos el objeto JSON para pasarselo a PHP
            var json = {oldpassword: oldpassword, newpassword: newpassword};
            var jsonString = JSON.stringify(json);

            //Enviamos el JSON por post a PHP para trabajar con el
            $.post("http://192.168.33.10/ProyectoFinal15-16-Desarrollo/Controlador/Login/Router.php?cod=2", {password: jsonString}, function(respuesta){
                $('#datos').html(respuesta).css("display","block");
            });
        }
    });

});