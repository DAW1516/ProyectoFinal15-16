<?php
namespace Vista\Produccion;
use Vista\Plantilla;
use Controlador\Produccion;
use Modelo\Base;

    require_once __DIR__."/../Plantilla/Views.php";
    require_once __DIR__."/../../Controlador/Produccion/Controlador.php";

    $tipoTareas = Produccion\Controlador::getTareasSelect();

    if(isset($_GET["cod"])){
        switch($_GET["cod"]){
            case 1:
                $hoy = date("d/m/Y");

                if($_GET["fecha"]==$hoy){

                    ?>
                        <input type="hidden" name="fecha" value="<?php echo $_GET["fecha"];?>">
                        <div class="form-group">
                            <label for="tarea" class="col-sm-3 control-label">Tarea: </label>
                            <div class="col-sm-9">
                            <select id="tarea" data-validetta="required" class="form-control">
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
                                <input type="text" id="numeroHoras" class="form-control" data-validetta="number">
                            </div>
                        </div>
                        <div class="form-group">
                        <label for="paquetesEntrada" class="col-sm-3 control-label">Nº Entrada: </label>
                        <div class="col-sm-9">
                            <input type="text" id="paquetesEntrada" class="form-control" data-validetta="number">
                        </div>
                        </div><div class="form-group">
                        <label for="paquetesSalida" class="col-sm-3 control-label">Nº Salida: </label>
                        <div class="col-sm-9">
                            <input type="text" id="paquetesSalida" class="form-control" data-validetta="number">
                        </div>
                        </div><div class="form-group">
                        <label for="paquetesTotal" class="col-sm-3 control-label">Nº Total: </label>
                        <div class="col-sm-9">
                            <input type="text" id="paquetesTotal" class="form-control" readonly="readonly">
                        </div>
                        </div><div class="form-group">
                        <div class="col-sm-12 col-xs-offset-1">
                            <input type="submit" class="btn btn-default" name="Enviar" value="Guardar">
                        </div>
                        </div>
                    <?php

                }else{
                    echo false;
                }
        }
    }else{
        header("Location:".Plantilla\Views::getUrlRaiz()."/Vista/Produccion/Calendario");
    }
?>
