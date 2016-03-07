/**
 * Created by Ruben on 4/3/16.
 */
$(document).ready(function(){


    $(document).on("click","#btnFestivo",function(e){

        var ok=true;

        if($("#motivo").val()==""){
            ok=false;
        }




        if(ok==false){
            e.preventDefault();
            $("#respuesta_form").html("<div class='alert alert-danger' role='alert'><strong>Error:</strong> Datos incorrectos.</div>");
        }else{
            $("#respuesta_form").html("");

            document.getElementById("festivosForm").submit();

        }


    });

});
