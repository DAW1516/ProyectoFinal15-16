<?php
namespace Vista\Administracion;
use Vista\Plantilla;
use Controlador\Produccion;
use Modelo\Base;

    require_once __DIR__."/../Plantilla/Views.php";
    require_once __DIR__."/../../Controlador/Administracion/Controlador.php";


    if(isset($_GET["cod"])){
        switch($_GET["cod"]){
            case 1:
                $hoy = date("d/m/Y");



                    ?>
                        <input type="hidden" name="fecha" value="<?php echo $_GET["fecha"];?>">
                        <input type="hidden" name="festEnv">
                        <input type="hidden" name="cod" value="1">

                        </div>
                        <div class="form-group">
                            <label for="motivo" class="col-sm-3 control-label">Motivo: </label>
                            <div class="col-sm-9">
                                <input type="text" id="motivo" class="form-control" name="motivo">
                            </div>
                        </div>

                        </div><div class="form-group">
                        <div class="col-sm-12 col-xs-offset-1">
                            <button type="button" name="btnFestivo" class="btn btn-default" id="btnFestivo">Guardar</button>
                        </div>
                        </div>
                    <?php



        }
    }else{
        header("Location:".Plantilla\Views::getUrlRaiz()."/Vista/Produccion/Calendario");
    }
?>
