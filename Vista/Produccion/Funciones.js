/**
 * Created by Mikel on 2/3/16.
 */

$(document).ready(function(){

    $("#formTareasProd").validetta({
        display: 'inline',
        errorTemplateClass: 'validetta-inline',
        realTime: true
    });

    $(document).on("blur","#paquetesEntrada,#paquetesSalida",function(e){
        if($("#paquetesEntrada").val()!=""&&$("#paquetesSalida").val()!=""){
            $("#paquetesTotal").val($("#paquetesEntrada").val()-$("#paquetesSalida").val());
        }else{
            $("#paquetesTotal").val("");
        }
    });

});