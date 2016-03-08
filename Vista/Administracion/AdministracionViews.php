<?php
namespace Vista\Administracion;

use \Controlador\Administracion;
use Controlador\Login\Controlador;

require_once __DIR__ . "/../Plantilla/Views.php";
require_once __DIR__ . "/../../Controlador/Administracion/Controlador.php";

abstract class AdministracionViews extends \Vista\Plantilla\Views
{

    public static function elegir(){

        parent::setOn(true);
        parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
            <h3 class="page-header">Añadir</h3>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertTrabajador.php">Añadir Trabajador</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertEmpresa.php">Añadir Empresa</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertVehiculo.php">Añadir Vehiculo</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertHorasConvenio.php">Añadir Convenio</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertCentro.php">Añadir Centro</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertTipoFranja.php">Añadir Tipo de Horario</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertHorario.php">Añadir Horario</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertHorarioTrabajador.php">Añadir Horario-trabajador</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertFestivo.php">Añadir Festivo</a><br/>
            <h3 class="page-header">Eliminar</h3>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteTrabajador.php">Ver Trabajadores</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteEmpresa.php">Ver Empresas</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteVehiculo.php">Ver Vehiculos</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteHorasConvenio.php">Ver Convenios</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteCentro.php">Ver Centros</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteTipoFranja.php">Ver Tipos de Horarios</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteHorario.php">Ver Horario</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteHorarioTrabajador.php">Ver Horario Trabajador</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteFestivo.php">Ver Festivos</a><br/>
            <h3 class="page-header">Modificar</h3>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/updateTipoFranja.php">Modificar Tipos de Horarios</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/updateHorasConvenio.php">Modificar Horas de Convenios</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/updatePassword.php">Modificar Contraseñas</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/updateFoto.php">Modificar Fotos</a>

        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";
    }

        public static function insertTrabajador()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            //<?php echo parent::getUrlRaiz()
            $empresas = \Controlador\Administracion\Controlador::getAllEmpresas();
            $perfiles = \Controlador\Administracion\Controlador::getAllPerfiles();

        ?>
        <div class="container ins">
            <form name="insertTrabajador" class="form-horizontal" method="post" enctype="multipart/form-data" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php">
                <fieldset>
                    <legend>Añadir Trabajador</legend>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">DNI:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="dni" maxlength="9">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Nombre:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Apellido 1:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="apellido1">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Apellido 2:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="apellido2">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Foto:</label>
                        <div class="col-sm-4 col-md-3">
                            <input name="foto" type="file">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Teléfono:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="telefono">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Empresa:</label>
                        <div class="col-sm-4 col-md-3">
                            <select class="form-control" name="empresa">
                                <?php
                                foreach($empresas as $empresa){

                                    ?>
                                    <option value="<?php echo $empresa->getId(); ?>"><?php echo $empresa->getNombre(); ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Centro:</label>
                        <div class="col-sm-4 col-md-3">
                            <select class="form-control" name="centro">
                                <?php
                                foreach($empresas as $empresa) {
                                    foreach($empresa->getCentros() as $centro){
                                        ?>
                                        <option value="<?php echo $centro->getId(); ?>"><?php echo $centro->getNombre(); ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Perfil:</label>
                        <div class="col-sm-4 col-md-3">
                            <select class="form-control" name="perfil">
                                <?php
                                for($x = 0; $x < sizeof($perfiles); $x++) {
                                    ?>
                                    <option value="<?php echo $perfiles[$x][1] ?>"><?php echo $perfiles[$x][1]  ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-2">
                            <input class="btn btn-primary" type="submit" name="addTrabajador" value="Añadir">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <?php

            require_once __DIR__ . "/../Plantilla/pie.php";

        }

    public static function deleteTrabajador(){

        parent::setOn(true);
        parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";

        $trabajadores = Administracion\Controlador::getAllTrabajadores();
        $trabajadorSession = unserialize($_SESSION['trabajador']);

        //problema en funcion getALl Trabajadores
        ?>
        <h2 class="page-header">Trabajadores</h2>
        <div class="table-responsive col-md-offset-1 col-md-10">
            <table class="table table-bordered">
                <tr>
                    <th>DNI</th>
                    <th>NOMBRE</th>
                    <th>APELLIDOS</th>
                    <th>TELEFONO</th>
                    <th>CENTRO</th>
                    <th>PERFIL</th>
                    <th>ACCIÓN</th>
                </tr>
                <?php
                foreach($trabajadores as $trabajador) {
                    if($trabajador->getDni() != $trabajadorSession->getDni()){
                        ?>

                        <tr>
                            <td><?php echo $trabajador->getDni(); ?></td>
                            <td><?php echo $trabajador->getNombre(); ?></td>
                            <td><?php echo $trabajador->getApellido1()." ".$trabajador->getApellido2(); ?></td>
                            <td><?php echo $trabajador->getTelefono(); ?></td>
                            <td><?php echo $trabajador->getCentro()->getNombre(); ?></td>
                            <td><?php echo substr(strrchr(get_class($trabajador), "\\"), 1); ?></td>
                            <td>
                                <form name="deleteTrabajador" method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                                    <button type="submit" name="eliminarTrabajador" value="Eliminar" style="border: none; background: none;"><span class="glyphicon glyphicon-remove" style="color:red; font-size: 1.5em"></span></button>
                                    <input type="hidden" name="dni" value="<?php echo $trabajador->getDni(); ?>">
                                </form>
                            </td>
                        </tr>

                        <?php

                    }

                }
                ?>
            </table>
        </div>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";
    }

        public static function insertEmpresa()
        {

            parent::setOn(true);
            parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
        <div class="container ins">
            <form class="form-horizontal" name="insertTrabajador" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Añadir Empresa</legend>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Nombre:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">NIF:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="nif" maxlength="9">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-2">
                            <input class="btn btn-primary" type="submit" name="addEmpresa" value="Añadir">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

        }

        public static function deleteEmpresa()
        {

            parent::setOn(true);
            parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";

        $empresas = Administracion\Controlador::getAllEmpresas();
        if(is_null($empresas)){
            echo "no hay empresas";
        }else {
            ?>
            <h2 class="page-header">Empresas</h2>
            <div class="table-responsive col-md-offset-1 col-md-10">
                <table class="table table-bordered">
                    <tr>
                        <th>EMPRESA</th>
                        <th>NIF</th>
                        <th>ACCIÓN</th>
                    </tr>
                    <?php
                    foreach ($empresas as $empresa) {
                        ?>
                        <tr>
                            <td><?php echo $empresa->getNombre(); ?></td>
                            <td><?php echo $empresa->getNif(); ?></td>
                            <td>
                                <form name="deleteTrabajador" method="post"
                                      action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                                    <button type="submit" name="eliminarEmpresa" value="Eliminar"
                                            style="border: none; background: none;"><span
                                            class="glyphicon glyphicon-remove"
                                            style="color:red; font-size: 1.5em"></span></button>
                                    <input type="hidden" name="id" value="<?php echo $empresa->getId(); ?>">
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <?php
        }
        require_once __DIR__ . "/../Plantilla/pie.php";

        }

        public static function insertCentro()
        {

            parent::setOn(true);
            parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $empresas = \Modelo\BD\EmpresaBD::getAll();
        $centros = \Modelo\BD\CentroBD::getAll();
        ?>
        <div class="container ins">
            <form class="form-horizontal" name="insertCentro" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Añadir Centro</legend>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Nombre:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="nombre">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Localización:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="localizacion">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Empresa:</label>
                        <div class="col-sm-4 col-md-3">
                            <select class="form-control" name="empresa">
                                <?php
                                foreach($empresas as $empresa){
                                    ?>
                                    <option value="<?php echo $empresa->getId(); ?>"><?php echo $empresa->getNombre(); ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-2">
                            <input class="btn btn-primary" type="submit" name="addCentro" value="Añadir">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>

        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";
    }

        public static function deleteCentro()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $centros = \Modelo\BD\CentroBD::getAll();
            if (is_null($centros)) {
                echo "No hay centros";
            } else {
                ?>
                <h2 class="page-header">Centros</h2>
                <div class="table-responsive col-md-offset-1 col-md-10">
                    <table class="table table-bordered">
                        <tr>
                            <th>CENTRO</th>
                            <th>LOCALIZACIÓN</th>
                            <th>EMPRESA</th>
                            <th>ACCIÓN</th>
                        </tr>
                        <?php
                        foreach ($centros as $centro) {
                            ?>
                            <form name="deleteTrabajador" method="post"
                                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                                <tr>
                                    <td><?php echo $centro->getNombre(); ?></td>
                                    <td><?php echo $centro->getLocalizacion(); ?></td>
                                    <td><?php echo $centro->getEmpresa()->getNombre(); ?></td>
                                    <td>
                                        <button type="submit" name="eliminarCentro" value="Eliminar"
                                                style="border: none; background: none;"><span
                                                class="glyphicon glyphicon-remove"
                                                style="color:red; font-size: 1.5em"></span></button>
                                    </td>
                                </tr>
                                <input type="hidden" name="id" value="<?php echo $centro->getId(); ?>">
                            </form>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <?php
            }
            require_once __DIR__ . "/../Plantilla/pie.php";
        }


        public static function insertEstado()
        {

            parent::setOn(true);
            parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
        <div class="container ins">
            <form class="form-horizontal" name="insertTrabajador" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Añadir Estado</legend>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Nombre:</label>
                        <div class="col-sm-4 col-md-3">
                           <input class="form-control" type="text" name="tipo">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-2">
                            <input class="btn btn-primary" type="submit" name="addEstado" value="Añadir">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function deleteEstado(){

        parent::setOn(true);
        parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $estados = Administracion\Controlador::getAllEstados();
        ?>
        <h2 class="page-header">Estados</h2>
        <div class="table-responsive col-md-offset-1 col-md-10">
            <table class="table table-bordered">
                    <tr>
                        <th>ESTADO</th>
                        <th>ACCIÓN</th>
                    </tr>
                    <?php
                    foreach($estados as $estado) {
                        ?>
                            <tr>
                                <td><?php echo $estado->getTipo(); ?></td>
                                <td>
                                    <form name="deleteEstado" method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                                        <input type="submit" name="eliminarEstado" value="Eliminar">
                                        <input type="hidden" name="id" value="<?php echo $estado->getId(); ?>">
                                    </form>
                                </td>
                            </tr>
                        <?php
                    }
                    ?>
            </table>
        </div>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

        public static function insertVehiculo()
        {

            parent::setOn(true);
            parent::setRoot(true);

            $centros = Administracion\Controlador::getAllCentros();
            require_once __DIR__ . "/../Plantilla/cabecera.php";
            ?>
            <div class="container ins">
                <form class="form-horizontal" name="insertTrabajador" method="post"
                      action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php"><br/>
                    <fieldset>
                        <legend>Añadir Vehiculo</legend>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-md-2">Centro:</label>
                            <div class="col-sm-4 col-md-3">
                                <select class="form-control" name="centro">
                                    <?php
                                    foreach ($centros as $indice => $valor) {
                                        ?>
                                        <option
                                            value="<?php echo $valor->getId() ?>"><?php echo $valor->getNombre() ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-md-2">Matrícula:</label>
                            <div class="col-sm-4 col-md-3">
                                <input class="form-control" type="text" name="matricula">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2 col-md-2">Marca:</label>
                            <div class="col-sm-4 col-md-3">
                                <input class="form-control" type="text" name="marca">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-2">
                                <input class="btn btn-primary" type="submit" value="Añadir" name="addVehiculo">
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
            <?php

        require_once __DIR__ . "/../Plantilla/pie.php";
        }

        public static function deleteVehiculo()
        {

            parent::setOn(true);
            parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $vehiculos = Administracion\Controlador::getAllVehiculos();
            if(is_null($vehiculos)){
                echo "No hay vehiculos";
            }else {
                ?>
                <h2 class="page-header">Vehículos</h2>
                <div class="table-responsive col-md-offset-1 col-md-10">
                    <table class="table table-bordered">
                        <tr>
                            <th>MATRICULA</th>
                            <th>MARCA</th>
                            <th>CENTRO</th>
                            <th>ACCIÓN</th>
                        </tr>
                        <?php
                        foreach ($vehiculos as $vehiculo) {
                            ?>
                            <tr>
                                <td><?php echo $vehiculo->getMatricula(); ?></td>
                                <td><?php echo $vehiculo->getMarca(); ?></td>
                                <td><?php echo $vehiculo->getCentro()->getNombre(); ?></td>
                                <td>
                                    <form name="deleteEstado" method="post"
                                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                                        <button class="btn btn-primary" type="submit" name="eliminarVehiculo"
                                                value="Eliminar" style="border: none; background: none;"><span
                                                class="glyphicon glyphicon-remove"
                                                style="color:red; font-size: 1.5em"></span></button>
                                        <input type="hidden" name="id" value="<?php echo $vehiculo->getId(); ?>">
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <?php
            }
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function insertHorasConvenio(){

            parent::setOn(true);
            parent::setRoot(true);

        $centros=Administracion\Controlador::getAllCentros();

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
        <div class="ins">
            <form class="form-horizontal" name="insertTrabajador" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Añadir Convenio</legend>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Centro:</label>
                        <div class="col-sm-4 col-md-3">
                            <select class="form-control" name="centro">
                                <?php
                                foreach($centros as $indice => $valor){
                                    ?>
                                    <option value="<?php echo $valor->getId()?>"><?php echo $valor->getNombre()?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Número de horas al año:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="number" name="horasAnual">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Denominación:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="denominacion">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-2">
                            <input class="btn btn-primary" type="submit" value="Añadir" name="addHorasConvenio">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";
    }

        public static function deleteHorasConvenio()
        {

            parent::setOn(true);
            parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $horasconvenio = Administracion\Controlador::getAllHorasConvenio();
            if(is_null($horasconvenio)){
                echo "no hay horas convenio";
            }else {
                ?>
                <h2 class="page-header">Convenios</h2>
                <div class="table-responsive col-md-offset-1 col-md-10">
                    <table class="table table-bordered">
                        <tr>
                            <th>CENTRO</th>
                            <th>DENOMINACION</th>
                            <th>HORAS</th>
                            <th>ACCIÓN</th>
                        </tr>
                        <?php
                        foreach ($horasconvenio as $horaconvenio) {
                            ?>
                            <tr>
                                <td><?php echo $horaconvenio->getCentro()->getNombre(); ?></td>
                                <td><?php echo $horaconvenio->getDenominacion() ?></td>
                                <td><?php echo $horaconvenio->getHorasAnual(); ?></td>
                              d  <td>
                                    <form name="deleteEstado" method="post"
                                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                                        <button type="submit" name="eliminarHorasConvenio" value="Eliminar"
                                                style="border: none; background: none;"><span
                                                class="glyphicon glyphicon-remove"
                                                style="color:red; font-size: 1.5em"></span></button>
                                        <input type="hidden" name="id" value="<?php echo $horaconvenio->getId(); ?>">
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                    </table>
                </div>
                <?php
            }
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function updateTipoFranja(){

        parent::setOn(true);
        parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $tipos = Administracion\Controlador::getAllTiposFranjas();
        if(is_null($tipos)){
            echo "No hay tipos de franja";
        }else {
            ?>
            <h2 class="page-header">Tipo de Franjas</h2>
            <div class="table-responsive col-md-offset-1 col-md-10">
                <table class="table table-bordered">
                    <tr>
                        <th>TIPO</th>
                        <th>PRECIO</th>
                        <th>NUEVO PRECIO</th>
                        <th>ACCIÓN</th>
                    </tr>
                    <?php
                    foreach ($tipos as $tipo) {
                        ?>
                        <tr>
                            <td><?php echo $tipo->getTipo(); ?></td>
                            <td><?php echo $tipo->getPrecio(); ?></td>
                            <form name="deleteEstado" method="post"
                                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                                <td><input type="text" name="nuevo" size="5" placeholder="00.00"></td>
                                <td>
                                    <button type="submit" name="updateTipoFranja" value="Editar"
                                            style="border: none; background: none;"><span
                                            class="glyphicon glyphicon-edit"
                                            style="color:blue; font-size: 1.5em"></span></button>
                                    <input type="hidden" name="id" value="<?php echo $tipo->getId(); ?>">
                                </td>
                            </form>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <?php
        }
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function insertTipoFranja(){

        parent::setOn(true);
        parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
        <div class="container">
            <form class="form-horizontal" name="insertTipoFranja" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Añadir Tipo Horario</legend>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Tipo de Horario:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="tipo" placeholder="Mañana, tarde, noche...">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2 col-md-2">Precio:</label>
                        <div class="col-sm-4 col-md-3">
                            <input class="form-control" type="text" name="precio">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4 col-sm-offset-2 col-md-3 col-md-offset-2">
                            <input class="btn btn-primary" type="submit" value="Añadir" name="addTipoFranja">
                        </div>
                    </div>
                </fieldset>
            </form>
        </div>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function deleteTipoFranja(){

        parent::setOn(true);
        parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $tipos = Administracion\Controlador::getAllTiposFranjas();
        if(is_null($tipos)){
            echo "no hay tipos";
        }else {
            ?>
            <h2 class="page-header">Convenios</h2>
            <div class="table-responsive col-md-offset-1 col-md-10">
                <table class="table table-bordered">
                    <tr>
                        <th>TIPO</th>
                        <th>PRECIO</th>
                        <th>ACCIÓN</th>
                    </tr>
                    <?php
                    foreach ($tipos as $tipo) {
                        ?>
                        <tr>
                            <td><?php echo $tipo->getTipo(); ?></td>
                            <td><?php echo $tipo->getPrecio(); ?></td>
                            <td>
                                <form name="deleteEstado" method="post"
                                      action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                                    <button class="btn btn-primary" type="submit" name="deleteTipoFranja"
                                            value="Eliminar" style="border: none; background: none;"><span
                                            class="glyphicon glyphicon-remove"
                                            style="color:red; font-size: 1.5em"></span></button>
                                    <input type="hidden" name="id" value="<?php echo $tipo->getId(); ?>">
                                </form>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <?php
        }
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function updateHorasConvenio(){

        parent::setOn(true);
        parent::setRoot(true);

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $horas = Administracion\Controlador::getAllHorasConvenio();
        if(is_null($horas)){
            echo "no hay horas";
        }else {
            ?>
            <h2 class="page-header">Convenios</h2>
            <div class="table-responsive col-md-offset-1 col-md-10">
                <table class="table table-bordered">
                    <tr>
                        <th>NOMBRE</th>
                        <th>HORAS</th>
                        <th>CENTRO</th>
                        <th>NUEVAS HORAS</th>
                        <th>ACCIÓN</th>
                    </tr>
                    <?php
                    foreach ($horas as $hora) {
                        ?>
                        <tr>
                            <td><?php echo $hora->getDenominacion(); ?></td>
                            <td><?php echo $hora->getHorasAnual(); ?></td>
                            <td><?php echo $hora->getCentro()->getNombre(); ?></td>
                            <form name="deleteEstado" method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                            <td>

                                    <input type="text" name="nuevo" size="5" placeholder="1200">
                                    <input type="hidden" name="id" value="<?php echo $hora->getId(); ?>">

                            </td>
                            <td>

                                    <button type="submit" name="updateHorasConvenio" value="Editar"
                                            style="border: none; background: none;"><span
                                            class="glyphicon glyphicon-edit"
                                            style="color:blue; font-size: 1.5em"></span></button>
                                    <input type="hidden" name="id" value="<?php echo $hora->getId(); ?>">

                            </td>
                            </form>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
            <?php
        }
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function updatePassword(){

        parent::setOn(true);
        parent::setRoot(true);

        $trabajadores = Administracion\Controlador::getAllTrabajadores();

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        if(is_null($trabajadores)){
            echo "no hay trabajadores";
        }else {
            ?>

            <h2 class="page-header">Trabajadores</h2>
            <div class="table-responsive col-md-offset-1 col-md-10">
                <table class="table table-bordered">
                    <tr>
                        <th>DNI</th>
                        <th>Nueva contraseña</th>
                        <th>Acción</th>
                    </tr>
                    <form name="updatePassword" method="post"
                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                        <tr>
                            <td>
                                <select class="form-control" name="trabajador">
                                    <?php foreach ($trabajadores as $trabajador) {
                                        echo "<option value='" . $trabajador->getDni() . "'>" . $trabajador->getDni() . "</option>";
                                    } ?>
                                </select>
                            </td>
                            <td><input class="form-control" type="password" name="password"/></td>
                            <td>
                                <button type="submit" name="updatePassword" value="Cambiar"
                                        style="border: none; background: none"><span class="glyphicon glyphicon-edit"
                                                                                     style="color: blue; font-size: 1.5em"></span>
                                </button>
                            </td>
                        </tr>
                    </form>
                </table>
            </div>

            <?php

            require_once __DIR__ . "/../Plantilla/pie.php";
            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $horas = Administracion\Controlador::getAllHorasConvenio();
            ?>

            <table>
                <tr>
                    <th>NOMBRE</th>
                    <th>HORAS</th>
                    <th>NUEVO PRECIO</th>
                    <th>CENTRO</th>
                    <th>ACCIÓN</th>
                </tr>
                <?php
                foreach ($horas as $hora) {
                    ?>
                    <form name="deleteEstado" method="post"
                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                        <tr>
                            <td><?php echo $hora->getDenominacion(); ?></td>
                            <td><?php echo $hora->getHorasAnual(); ?></td>
                            <td><?php echo $hora->getCentro()->getNombre(); ?></td>
                            <td><input type="text" name="nuevo" size="5" placeholder="1200"></td>
                            <td><input type="submit" name="updateHorasConvenio" value="Editar"></td>
                        </tr>
                        <input type="hidden" name="id" value="<?php echo $hora->getId(); ?>">
                    </form>
                    <?php
                }
                ?>
            </table>
            <?php
        }
            require_once __DIR__ . "/../Plantilla/pie.php";

        }

        public static function insertarHorario()
        {
            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $franjas = Administracion\Controlador::getAllFranjas();

            ?>
            <form name="insertarFranja" method="post"
                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                <label>Nombre horario</label><input type="text" name="horario">
                <select name="horaInicio">
                    <?php
                    foreach ($franjas as $valor) {
                        ?>
                        <option value="<?php echo $valor->getId() ?>"><?php echo $valor->getHoraInicio() ?></option>
                        <?php
                    }
                    ?>
                </select>
                <select name="horaFin">
                    <?php
                    foreach ($franjas as $valor) {
                        ?>
                        <option value="<?php echo $valor->getId() ?>"><?php echo $valor->getHoraFin() ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" value="Añadir" name="addHorario">
            </form>

            <?php

            require_once __DIR__ . "/../Plantilla/pie.php";
        }

        public static function deleteHorario()
        {
            parent::setOn(true);
            parent::setRoot(true);
            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $horarios = Administracion\Controlador::getAllHorarios();
            if(is_null($horarios)){
                echo "No hay horarios";
            }else {
                ?>

                <table>
                    <tr>
                        <th>HORARIO</th>
                        <th>ACCIÓN</th>
                    </tr>
                    <?php
                    foreach ($horarios as $horario) {
                        ?>
                        <form name="deleteHorario" method="post"
                              action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                            <tr>
                                <td><?php echo $horario->getTipo() ?></td>

                                <td><input type="submit" name="eliminarHorario" value="Eliminar"></td>
                            </tr>
                            <input type="hidden" name="id" value="<?php echo $horario->getId(); ?>">
                        </form>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
            require_once __DIR__ . "/../Plantilla/pie.php";
        }

        public static function insertHorarioTrabajador()
        {
            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $trabajadores = Administracion\Controlador::getAllTrabajadores();
            $horarios = Administracion\Controlador::getAllHorarios();
            ?>
            <form method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                <select name="trabajador">
                    <?php
                    foreach ($trabajadores as $trabajador) {
                        ?>
                        <option
                            value="<?php echo $trabajador->getDni() ?>"><?php echo $trabajador->getDni() . "--" . $trabajador->getNombre() ?></option>
                        <?php
                    }
                    ?>
                </select>
                <select name="semana">
                    <?php
                    for ($x = 1; $x <= 52; $x++) {
                        ?>
                        <option value="<?php echo $x ?>"><?php echo $x ?></option>
                        <?php
                    }
                    ?>
                </select>
                <select name="horario">
                    <?php
                    foreach ($horarios as $horario) {
                        ?>
                        <option value="<?php echo $horario->getId() ?>"><?php echo $horario->getTipo() ?></option>
                        <?php
                    }
                    ?>
                </select>
                <input type="submit" value="Añadir" name="añadirHorarioTrabajador">
            </form>

            <?php
            require_once __DIR__ . "/../Plantilla/pie.php";
        }

        public static function deleteHorarioTrabajador()
        {
            parent::setOn(true);
            parent::setRoot(true);
            $horarioTrabajador = Administracion\Controlador::getAllHoraioTrabajador();
            require_once __DIR__ . "/../Plantilla/cabecera.php";
            ?>

            <table>
                <tr>
                    <th>TRABAJADOR</th>
                    <th>SEMANA</th>
                    <th>HORARIO</th>
                    <th>ACCIÓN</th>
                </tr>
                <?php
                foreach ($horarioTrabajador as $horario) {
                    ?>
                    <form method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                        <tr>
                            <td><?php echo $horario->getTrabajador()->getDni() ?></td>
                            <td><?php echo $horario->getNumeroSemana() ?></td>
                            <td><?php echo $horario->getHorario()->getTipo() ?></td>
                            <td><input type="submit" value="Eliminar" name="borrarHorarioTrabajador"></td>
                        </tr>
                        <input type="hidden" value="<?php echo $horario->getId() ?>" name="id">
                    </form>
                    <?php
                }
                ?>
            </table>
            <?php


            require_once __DIR__ . "/../Plantilla/pie.php";
        }

        public static function allPartesByDni()
        {

            parent::setOn(true);
            parent::setRoot(true);
            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $partesProd = Administracion\Controlador::getAllPartesProduccion();
            $partesLog = Administracion\Controlador::getAllPartesLogistica();
            ?>
            Filtros:
            <form name="buscar">
            <label>DNI: </label><input type="text" name="dni" size="10">
            <button type="button" id="buscar" style="border: none; background: none"><span
                    class="glyphicon glyphicon-search" style="color:black; font-size: 1.5em"></span></button>
            </form>
            <span id="respuesta">
            <table class="table table-bordered text-center">

                <h2>PARTES LOGÍSTICA</h2>
                <tr>
                    <th>DNI</th>
                    <th>FECHA</th>
                    <th>NOTA</th>
                    <th>ESTADO</th>
                    <th>ACCIÓN</th>
                </tr>
                <?php
                foreach ($partesLog as $log) {
                    if ($log->getEstado()->getTipo() == "Cerrado") {
                        ?>
                        <form method="post"
                              action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                            <tr>
                                <td><?php echo $log->getTrabajador()->getDni(); ?></td>
                                <td><?php echo $log->getFecha(); ?></td>
                                <td><?php echo $log->getNota(); ?></td>
                                <td><?php echo $log->getEstado()->getTipo(); ?></td>
                                <td>

                                        <button type="submit" name="validarParteLogistica"
                                                style="border: none; background: none"><span
                                                class="glyphicon glyphicon-ok"
                                                style="color:green; font-size: 1.5em"></span></button>
                                        <button type="submit" name="eliminarParteLogistica"
                                                style="border: none; background: none"><span
                                                class="glyphicon glyphicon-remove" style="color:red; font-size: 1.5em">
                                        </button>
                                        <button type="submit" name="abrirParteProduccion"
                                                style="border: none; background: none"><span
                                                class="glyphicon glyphicon-open-file" style="color:blue; font-size: 1.5em">
                                        </button>

                                </td>
                            </tr>
                            <input type="hidden" name="id" value="<?php echo $log->getId(); ?>">
                        </form>
                        <?php
                    }
                }
                ?>
            </table>
            <table class="table table-bordered text-center">
                <h2>PARTES PRODUCCIÓN</h2>
                <tr>
                    <th>DNI</th>
                    <th>FECHA</th>
                    <th>INCIDENCIAS</th>
                    <th>AUTOPISTAS</th>
                    <th>DIETAS</th>
                    <th>OTROS GASTOS</th>
                    <th>ESTADO</th>
                    <th>ACCIÓN</th>
                </tr>
                <?php
                foreach ($partesProd as $prod) {
                    if ($prod->getEstado()->getTipo() == "Cerrado") {
                        ?>
                        <form method="post"
                              action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                            <tr>
                                <td><?php echo $prod->getTrabajador()->getDni(); ?></td>
                                <td><?php echo $prod->getFecha(); ?></td>
                                <td><?php echo $prod->getIncidencia(); ?></td>
                                <td><?php echo $prod->getAutopista(); ?></td>
                                <td><?php echo $prod->getDieta(); ?></td>
                                <td><?php echo $prod->getOtroGasto(); ?></td>
                                <td><?php echo $prod->getEstado()->getTipo(); ?></td>
                                <td>

                                        <button type="submit" name="validarParteProduccion"
                                                style="border: none; background: none"><span
                                                class="glyphicon glyphicon-ok"
                                                style="color:green; font-size: 1.5em"></span></button>
                                        <button type="submit" name="eliminarParteProduccion"
                                                style="border: none; background: none"><span
                                                class="glyphicon glyphicon-remove" style="color:red; font-size: 1.5em">
                                        </button>
                                        <button type="submit" name="abrirParteProduccion"
                                                style="border: none; background: none"><span
                                                class="glyphicon glyphicon-open-file" style="color:blue; font-size: 1.5em">
                                        </button>


                                </td>
                            </tr>
                            <input type="hidden" name="id" value="<?php echo $prod->getId(); ?>">
                        </form>
                        <?php
                    }
                }
                ?>
            </table>
            </span>
            <?php

            require_once __DIR__ . "/../Plantilla/pie.php";

                }

        public static function insertarFestivo(){

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $festivos = Administracion\Controlador::getAllFestivos();
            ?>
            <form name="insertarFestivo" method="post"
                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                <label>Motivo: </label><input type="text" name="motivo" placeholder="Navidad, puente,...">
                <label>Fecha: </label><input type="text" name="fecha" placeholder="aaaa-mm-dd" size="5">


                <button type="submit" name="añadirFestivo">Añadir</button>
            </form>

            <?php

            require_once __DIR__ . "/../Plantilla/pie.php";

        }

        public static function deleteFestivo(){
            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $festivos = Administracion\Controlador::getAllFestivos();
            if(is_null($festivos)){
                echo "No hay festivos";
            }else {
                ?>

                <table class="table table-bordered text-center">
                    <tr>
                        <th>MOTIVO</th>
                        <th>FECHA</th>
                        <th>ACCIÓN</th>
                    </tr>
                    <?php
                    foreach ($festivos as $festivo) {
                        ?>
                        <form name="delFestivo" method="post"
                              action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                            <tr>
                                <td><?php echo $festivo->getMotivo(); ?></td>
                                <td><?php echo $festivo->getFecha(); ?></td>
                                <td>
                                    <button type="submit" name="deleteFestivo" style="border: none; background: none">
                                        <span class="glyphicon glyphicon-remove"
                                              style="color:red; font-size: 1.5em"></span></button
                                </td>
                            </tr>
                            <input type="hidden" name="id" value="<?php echo $festivo->getId(); ?>">
                        </form>
                        <?php
                    }
                    ?>
                </table>
                <?php
            }
            require_once __DIR__ . "/../Plantilla/pie.php";
        }
    public static function updateFoto(){

        parent::setOn(true);
        parent::setRoot(true);

        $trabajadores = Administracion\Controlador::getAllTrabajadores();

        require_once __DIR__ . "/../Plantilla/cabecera.php";

        ?>

        <h2 class="page-header">Trabajadores</h2>
        <div class="table-responsive col-md-offset-1 col-md-10">
            <table class="table table-bordered">
                <tr>
                    <th>DNI</th>
                    <th>Nueva foto</th>
                    <th>Acción</th>
                </tr>
                <form name="updatePassword" method="post" enctype="multipart/form-data" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                    <tr>
                        <td>
                            <select class="form-control" name="trabajador">
                                <?php foreach($trabajadores as $trabajador){
                                    echo "<option value='".$trabajador->getDni()."'>".$trabajador->getDni()."</option>";
                                } ?>
                            </select>
                        </td>
                        <td><input class="form-control" type="file" name="foto"/></td>
                        <td><button type="submit" name="updateFoto" value="Cambiar" style="border: none; background: none"><span class="glyphicon glyphicon-edit" style="color: blue; font-size: 1.5em"></span></button></td>
                    </tr>
                </form>
            </table>
        </div>

        <?php

        require_once __DIR__ . "/../Plantilla/pie.php";

    }


}

