$(document).ready(function(){


    $('#entrar').click(function(){

        //Encriptar contraseña a md5
        var contrasena = hex_md5($('#contrasena').val());
        var usuario = $('#usuario').val();

        //Creamos el objeto JSON para pasarselo a PHP
        var json = {usuario: usuario, contrasena: contrasena};
        var jsonString = JSON.stringify(json);

        //Enviamos el JSON por post a PHP para trabajar con el
        $.post("http://192.168.33.10/ProyectoFinal15-16/Controlador/Calendario/Router.php?cod=1", {usuario: jsonString}, function(respuesta){
            $('#datos').html(respuesta);
        });
    })
});