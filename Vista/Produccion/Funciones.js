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

});