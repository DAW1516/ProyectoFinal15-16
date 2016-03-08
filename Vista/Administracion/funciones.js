/**
 * Created by 2gdwes10 on 7/3/16.
 */

$(document).ready(function(){


    $('#buscar').on("click", function(){
        eliminar(alert($('[name="dni"]').val()));
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