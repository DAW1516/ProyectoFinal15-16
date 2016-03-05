<?php
namespace Vista\Produccion;
use Vista\Plantilla;
/**
 * Created by PhpStorm.
 * User: Nestor
 * Date: 02/03/2016
 * Time: 8:53
 */

require_once __DIR__.'/../../Modelo/BD/GenericoBD.php';;
require_once __DIR__.'/../Plantilla/Views.php';



abstract class CalendarioViews extends Plantilla\Views
{

public static function generarcalendario(){

    require_once __DIR__ . "/../Plantilla/Cabecera.php";
    ?>

    <link type="text/css" rel="stylesheet" media="all" href="<?php echo parent::getUrlRaiz()?>/Vista/Plantilla/CSS/Bootstrap/estilos.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
    <body>
    <div class="calendario_ajax container">
        <div class="cal row"></div><div id="mask" class="row"></div>
    </div>

    <script>
        function generar_calendario(mes,anio)
        {
            var agenda=$(".cal");
            agenda.html("<img src='<?php echo parent::getUrlRaiz()?>/Vista/Plantilla/IMG/loading.gif' alt='Loading'");
            $.ajax({
                type: "POST",
                url: "<?php echo parent::getUrlRaiz()?>/Controlador/Produccion/ControladorCalendario.php",
                cache: false,
                data: { mes:mes,anio:anio,accion:"generar_calendario" }
            }).done(function( respuesta )
            {
                agenda.html(respuesta);
            });
        }

        function formatDate (input) {
            var datePart = input.match(/\d+/g),
                year = datePart[0].substring(0),
                month = datePart[1], day = datePart[2];
            return day+'/'+month+'/'+year;
        }

        $(document).ready(function()
        {
            /* GENERAMOS CALENDARIO CON FECHA DE HOY */
            generar_calendario("<?php if (isset($_GET["mes"])) echo $_GET["mes"]; ?>","<?php if (isset($_GET["anio"])) echo $_GET["anio"]; ?>");


            /* AGREGAR UN PARTE */
            $(document).on("click",'a.add',function(e)
            {
                e.preventDefault();

                var id = $(this).data('evento');
                var fecha = $(this).attr('rel');

                setTimeout(function(){$(".cal").css("display","none")},20);

                $.ajax({
                    type: "POSt",
                    url: "<?php echo parent::getUrlRaiz()?>/Vista/Produccion/GeneradorFormsViews.php",
                    cache: false,
                    data: { fecha:formatDate(fecha),cod:1 }
                }).done(function( respuesta ){
                    if(respuesta==false){
                        $("#respuesta_form").html("<div class='alert alert-danger' role='alert'><strong>Error:</strong> La fecha del Parte es Incorrecta.</div>");
                        $(".formeventos").css("display","none")
                    }else{
                        $(".formeventos").html(respuesta);
                    }
                });

                $('#mask').fadeIn(700)
                .html(
                    "<a class='close'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a>" +
                    "<div id='nuevo_evento col-xs-12 text-center' rel='"+fecha+"'>" +
                        "<h2>Parte de "+formatDate(fecha)+"</h2>" +
                    "</div>" +
                    "<div class='window row' rel='"+fecha+"'>"+
                        "<div id='respuesta_form' class='col-xs-12 col-md-8 col-md-offset-2'></div>" +
                        "<div class='col-xs-12 col-md-8 col-md-offset-1'>"+
                            "<form class='formeventos form-horizontal' id='tareasProd'>" +
                                //"<input type='text' name='evento_titulo' id='evento_titulo' class='required'>" +
                                //"<input type='button' name='Enviar' value='Guardar' class='enviar'>" +
                                //"<input type='hidden' name='evento_fecha' id='evento_fecha' value='"+fecha+"'>" +
                            "</form>"+
                        "</div>"+
                    "</div>");
                });

            /* LISTAR TAREAS DEL PARTE */
            $(document).on("click",'a.mod',function(e)
            {
                e.preventDefault();

                setTimeout(function(){$(".cal").css("display","none")},20);

                var fecha = $(this).attr('rel');

                $('#mask').fadeIn(700).html("<a class='close'><span class='glyphicon glyphicon-remove' aria-hidden='true'></span></a><div id='nuevo_evento' class='window' rel='"+fecha+"'><h2>Parte del "+formatDate(fecha)+"</h2><div id='respuesta'></div><div id='respuesta_form'></div></div>");

                $.ajax({
                    type: "POST",
                    url: "<?php echo parent::getUrlRaiz()?>/Controlador/Produccion/ControladorCalendario.php",
                    cache: false,
                    data: { fecha:fecha,accion:"listar_evento" }
                }).done(function( respuesta )
                {
                    $("#respuesta_form").html(respuesta);
                });

            });

            //CERRAR DEL VENTANA
            $(document).on("click",'.close',function (e)
            {
                e.preventDefault();

                    setTimeout(function(){$("#mask").css("display","none")},20);

                    $(".cal").fadeIn(700);
                    var fecha=$(".window").attr("rel");
                    var fechacal=fecha.split("-");
                    generar_calendario(fechacal[1],fechacal[0]);

            });

            //GUARDAR PARTE
            $(document).on("click",'.enviar',function (e)
            {
                e.preventDefault();

                var ok=true;

                //Validaciones
                if($("#tarea").val()==""){ok=false;}
                if($("#numeroHoras").val()!=""){var nh = parseFloat($("#numeroHoras").val());if(isNaN(nh)){ok=false;}}
                if($("#paquetesEntrada").val()!=""){var pe = parseInt($("#paquetesEntrada").val());if(isNaN(pe)){ok=false;}}
                if($("#paquetesSalida").val()!=""){var ps = parseInt($("#paquetesSalida").val());if(isNaN(ps)){ok=false;}}

                if(ok==false){
                    e.preventDefault();
                    $("#respuesta_form").html("<div class='alert alert-danger' role='alert'><strong>Error:</strong> Datos incorrectos.</div>");
                }else{
                    var tarea = $("#tarea").val();
                    var numeroHoras = $("#numeroHoras").val();
                    var paquetesEntrada = $("#paquetesEntrada").val();
                    var paquetesSalida = $("#paquetesSalida").val();
                    var fecha = $("#fecha").val();

                    $.ajax({
                        type: "POST",
                        url: "<?php echo parent::getUrlRaiz()?>/Controlador/Produccion/ControladorCalendario.php",
                        cache: false,
                        data: {tarea:tarea,numeroHoras:numeroHoras,paquetesEntrada:paquetesEntrada,paquetesSalida:paquetesSalida,fecha:fecha,accion:"addTarea"}
                    }).done(function( respuesta )
                    {
                        $("#respuesta_form").html(respuesta);

                        if($("#fres").attr("class").search("alert-success")!=-1){
                            document.getElementById("tareasProd").reset();

                            setTimeout(function(){
                                $("#respuesta_form").html("");
                            },2200)
                        }
                    });
                }

            });

            //ELIMINAR TAREA
            $(document).on("click",'.eliminar_tarea',function (e)
            {
                e.preventDefault();
                var current_p=$(this);
                $("#respuesta").html("<img src='<?php echo parent::getUrlRaiz()?>/Vista/Plantilla/IMG/loading.gif''>");
                var id=$(this).attr("rel");
                $.ajax({
                    type: "POST",
                    url: "<?php echo parent::getUrlRaiz()?>/Controlador/Produccion/ControladorCalendario.php",
                    cache: false,
                    data: { id:id,accion:"borrar_tarea" }
                }).done(function( respuesta2 )
                {
                    $("a.mod").trigger("click");
                });
            });

            //EDITAR TAREA
            $(document).on("click",".editar_tarea",function(e){
                e.preventDefault();

                var idTarea = $(this).attr("rel");

                alert(idTarea);

            });

            $(document).on("click",".anterior,.siguiente,.hoyEnlace",function(e)
            {
                e.preventDefault();
                var datos=$(this).attr("rel");
                var nueva_fecha=datos.split("-");
                generar_calendario(nueva_fecha[1],nueva_fecha[0]);
            });

        });
    </script>

    <!-- ESTO NO TE HACE FALTA! -->
    <script type="text/javascript">
        var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
        document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    </script>
    <script type="text/javascript">
        try {
            var pageTracker = _gat._getTracker("UA-266167-20");
            pageTracker._setDomainName(".martiniglesias.eu");
            pageTracker._trackPageview();
        } catch(err) {}</script>
<?php
    require_once __DIR__ . "/../Plantilla/Pie.php";
}

}

