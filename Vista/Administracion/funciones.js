/**
 * Created by 2gdwes10 on 7/3/16.
 */

$(document).ready(function(){


    $('#buscar').on("click", function(){
        var dni = $('[name="dni"]').val().toUpperCase();
        $.ajax({
            type: "POST",
            url: "http://192.168.33.10/ProyectoFinal15-16/Controlador/Administracion/Router.php",
            cache: false,
            data: { dni:dni }
        }).done(function( respuesta )
        {
            $('#respuesta').html(respuesta);
        });
    })
    $('#buscarg').on("click", function(){
        var dni = $('[name="dni"]').val().toUpperCase();
        $.ajax({
            type: "POST",
            url: "http://192.168.33.10/ProyectoFinal15-16/Controlador/Gerencia/Router.php",
            cache: false,
            data: { dni:dni }
        }).done(function( respuesta )
        {
            $('#respuesta').html(respuesta);
        });
    })


});


function eliminar(parametro){

    $('#contenido table tr').each(function(){
        var variable="false"
        $(this).find("td").each(function(){
           if($(this).text()==parametro){
               variable="true";
           }
        })
        if(variable==false){
            $(this).prop("class","hidden")
        }
    })


}