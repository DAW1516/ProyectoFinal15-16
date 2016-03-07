<?php
namespace Vista\Produccion;
use Vista\Plantilla;
use Controlador\Produccion;
use Modelo\Base;

    require_once __DIR__."/../Plantilla/Views.php";
    require_once __DIR__."/../../Controlador/Produccion/Controlador.php";

    $tipoTareas = Produccion\Controlador::getTareasSelect();

    if(isset($_POST["cod"])){
        switch($_POST["cod"]){
            case 1:
                $hoy = date("d/m/Y");

                if($_POST["fecha"]<=$hoy){

                    ?>
                        <input type="hidden" name="fecha" id="fecha" value="<?php echo $_POST["fecha"];?>">
                        <input type="hidden" name="enviar">
                        <input type="hidden" name="cod" value="1">
                        <div class="form-group">
                            <label for="tarea" class="col-sm-3 control-label">Tarea: </label>
                            <div class="col-sm-9">
                            <select id="tarea" class="form-control" name="tarea">
                                <option value="">Eliga</option>
                                <?php

                                foreach($tipoTareas as $tipo){
                                   ?>
                                        <optgroup label="<?php echo $tipo->getDescripcion()?>">
                                            <?php
                                                foreach($tipo->getTareas() as $tarea){
                                                     ?><option value="<?php echo $tarea->getId(); ?>"><?php echo $tarea->getDescripcion(); ?></option><?php
                                                }
                                            ?>
                                        </optgroup>
                                  <?php
                                }

                                ?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="numeroHoras" class="col-sm-3 control-label">Horas: </label>
                            <div class="col-sm-9">
                                <input type="text" id="numeroHoras" class="form-control" name="numeroHoras">
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="paquetesEntrada" class="col-sm-3 control-label">Nº Entrada: </label>
                        <div class="col-sm-9">
                            <input type="text" id="paquetesEntrada" class="form-control" name="paquetesEntrada">
                        </div>
                        </div><div class="form-group">
                        <label for="paquetesSalida" class="col-sm-3 control-label">Nº Salida: </label>
                        <div class="col-sm-9">
                            <input type="text" id="paquetesSalida" class="form-control" name="paquetesSalida">
                        </div>
                        </div><div class="form-group">
                        <label for="paquetesTotal" class="col-sm-3 control-label">Nº Total: </label>
                        <div class="col-sm-9">
                            <input type="text" id="paquetesTotal" class="form-control" readonly="readonly">
                        </div>
                        </div><div class="form-group">
                        <div class="col-sm-12 col-xs-offset-1">
                            <button type="button" name="btnEnviar" class="btn btn-primary enviar">Guardar</button>
                        </div>
                        </div>
                    <?php


                }else{
                    echo false;
                }
            break;
            case 2:
                ?>
                    <form class="form-horizontal">
                        <input type="hidden" name="enviar">
                        <input type="hidden" name="idParte" value="<?php echo $_POST["idParte"]; ?>">
                        <div class="form-group">
                            <div class="radio col-xs-6 text-right">
                                <input type="radio" name="tipoJornada" id="tipo1" value="1">Jornada Continua
                            </div>
                            <div class="radio col-xs-6 text-left">
                                <input type="radio" name="tipoJornada" id="tipo2" value="2">Jornada Partida
                            </div>
                        </div><br/>
                        <div class="form-group" id="jornada">

                        </div>
                        <div class="form-group col-sm-4">
                            <label class="col-sm-6 control-label">Autopista/Peajes:</label>
                            <div class="input-group col-sm-3">
                                <input type="text" class="form-control" name="autopista" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="col-sm-6 control-label">Dietas:</label>
                            <div class="input-group col-sm-3">
                                <input type="text" class="form-control" name="dieta" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="form-group col-sm-4">
                            <label class="col-sm-6 control-label">Otros Gastos:</label>
                            <div class="input-group col-sm-3">
                                <input type="text" class="form-control" name="otroGastos" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2">€</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Incidencias:</label>
                            <div class="input-group col-sm-6">
                                <textarea class="form-control" id="tex1" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group col-xs-12">
                               <!-- <button type="button" name="btnCerrarParte" class="btn btn-primary cerrarParte">Guardar</button>-->
                        </div>
                        <script>
                            $(document).ready(function(){
                                $("input[name='tipoJornada']").click(function(){
                                    var valor = $('this').val();
                                    if(valor=="1"){
                                        $("#jornada").html("");
                                    }else if(valor=="2"){
                                        $.ajax({
                                            type: "POST",
                                            url: "<?php echo Plantilla\Views::getUrlRaiz()?>/Vista/Produccion/GeneradorFormsViews.php",
                                            cache: false,
                                            data: { cod:4}
                                        }).done(function( respuesta2 )
                                        {
                                            $("#jornada").html(respuesta2);

                                        });
                                    }
                                });
                            });

                        </script>
                    </form>
                <?php
            break;
            case 3:
                ?>
                <label class="col-sm-6 control-label">Franja horaria</label>
                <div class="input-group col-sm-3">
                    <select name="franja">
                        <?php
                        for($x = 0;$x<24;$x++){
                            echo '<option value="'.$x.'">'.$x.'</option>';
                        }
                        ?>

                    </select>
                </div>

                <?php
                break;
            case 4:
                ?>
                <?php
                break;

        }
    }else{
        header("Location:".Plantilla\Views::getUrlRaiz()."/Vista/Produccion/Calendario");
    }
?>
