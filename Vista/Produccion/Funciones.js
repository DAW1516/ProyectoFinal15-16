/**
 * Created by Mikel on 2/3/16.
 */

$(document).ready(function(){

    $(document).on("blur","#paquetesEntrada,#paquetesSalida",function(e){
        if($("#paquetesEntrada").val()!=""&&$("#paquetesSalida").val()!=""){
            $("#paquetesTotal").val($("#paquetesEntrada").val()-$("#paquetesSalida").val());
        }else{
            $("#paquetesTotal").val("");
        }
    });

    $(document).on("click","#btnParte",function(e){

        var ok=true;

        if($("#tarea").val()==""){
            ok=false;
        }

        if($("#numeroHoras").val()!=""){

            var nh = parseFloat($("#numeroHoras").val());

            if(isNaN(nh)){
                ok=false;
            }
        }

        if($("#paquetesEntrada").val()!=""){

            var pe = parseInt($("#paquetesEntrada").val());

            if(isNaN(pe)){
                ok=false;
            }
        }

        if($("#paquetesSalida").val()!=""){

            var ps = parseInt($("#paquetesSalida").val());

            if(isNaN(ps)){
                ok=false;
            }
        }

        if(ok==false){
            e.preventDefault();
            $("#respuesta_form").html("<div class='alert alert-danger' role='alert'><strong>Error:</strong> Datos incorrectos.</div>");
        }else{
            $("#respuesta_form").html("");

            document.getElementById("tareasProd").submit();

        }


    });

});