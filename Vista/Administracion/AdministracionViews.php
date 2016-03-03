<?php

use \Controlador\Administracion;

require_once __DIR__ . "/../Plantilla/Views.php";
require_once __DIR__."/../../Controlador/Administracion/Controlador.php";

abstract class AdministracionViews extends \Vista\Plantilla\Views{

    public static function elegir(){
        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
        <fieldset>
            <legend>Añadir</legend>
        <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertTrabajador.php">Añadir Trabajador</a><br/>
            <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertEmpresa.php">Añadir Empresa</a><br/>
            <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertEstado.php">Añadir Estado</a><br/>
            <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertVehiculo.php">Añadir Vehiculo</a><br/>
            <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/insertHorasConvenio.php">Añadir Horas Convenio</a><br/>

        </fieldset>
        <fieldset>
            <legend>Borrar</legend>
            <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteTrabajador.php">Borrar Trabajador</a><br/>
                <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteEmpresa.php">Borrar Empresa</a><br/>
            <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteEstado.php">Borrar Estado</a><br/>
            <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteVehiculo.php">Borrar Vehiculo</a><br/>
            <a href="<?php echo self::getUrlRaiz()?>/Vista/Administracion/deleteHorasConvenio.php">Borrar Horas Convenio</a><br/>
        <br/></fieldset>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";
    }

    public static function insertTrabajador(){

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        //<?php echo parent::getUrlRaiz()
        $empresas = \Controlador\Administracion\Controlador::getAllEmpresas();
        $perfiles = \Controlador\Administracion\Controlador::getAllPerfiles();

        ?>
            <form name="insertTrabajador" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Insertar Persona</legend>
                    <label></label><input type="text" name="dni" placeholder="Dni"><br/>
                    <label></label><input type="text" name="nombre" placeholder="Nombre"><br/>
                    <label></label><input type="text" name="apellido1" placeholder="Apellido 1"><br/>
                    <label></label><input type="text" name="apellido2" placeholder="Apellido 2"><br/>
                    <label></label><input type="text" name="telefono" placeholder="Telefono"><br/>
                    <label></label><select name="empresa">
                        <?php
                            foreach($empresas as $empresa){

                                ?>
                                <option value="<?php echo $empresa->getId(); ?>"><?php echo $empresa->getNombre(); ?></option>
                                <?php
                            }
                        ?>
                    </select><br/>
                    <select name="centro">
                        <?php
                        foreach($empresas as $empresa) {
                            foreach($empresa->getCentros() as $centro){
                                ?>
                                <option value="<?php echo $centro->getId(); ?>"><?php echo $centro->getNombre(); ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select><br/>
                    <select name="perfil">
                        <?php
                            for($x = 0; $x < sizeof($perfiles); $x++) {
                                ?>
                                <option value="<?php echo $perfiles[$x][1] ?>"><?php echo $perfiles[$x][1]  ?></option>
                                <?php
                            }
                        ?>
                    </select>
                    <input type="submit" name="addTrabajador" value="Añadir">
                </fieldset>
            </form>
        <?php

        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function deleteTrabajador(){

        require_once __DIR__ . "/../Plantilla/cabecera.php";

        $trabajadores = Administracion\Controlador::getAllTrabajadores();

        //problema en funcion getALl Trabajadores
        ?>
        <table>
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
            ?>
                <form name="deleteTrabajador" method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                        <tr>
                            <td><?php echo $trabajador->getDni(); ?></td>
                            <td><?php echo $trabajador->getNombre(); ?></td>
                            <td><?php echo $trabajador->getApellido1()." ".$trabajador->getApellido2(); ?></td>
                            <td><?php echo $trabajador->getTelefono(); ?></td>
                            <td><?php echo $trabajador->getCentro()->getNombre(); ?></td>
                            <td><?php echo substr(strrchr(get_class($trabajador), "\\"), 1); ?></td>
                            <td><input type="submit" name="eliminarTrabajador" value="Eliminar"></td>
                        </tr>
                        <input type="hidden" name="dni" value="<?php echo $trabajador->getDni(); ?>">
                </form>
            <?php
        }
        ?>
        </table>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function insertEmpresa(){

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
        <form name="insertTrabajador" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Insertar Empresa</legend>
                    <label></label><input type="text" name="nombre" placeholder="Nombre"><br/>
                    <label></label><input type="text" name="nif" placeholder="Nif"><br/>
                    <input type="submit" name="addEmpresa" value="Añadir">
                </fieldset>
        </form>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function deleteEmpresa(){

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $empresas = Administracion\Controlador::getAllEmpresas();
        ?>
        <table>
            <tr>
                <th>EMPRESA</th>
                <th>NIF</th>
                <th>ACCIÓN</th>
            </tr>
            <?php
            foreach($empresas as $empresa) {
                ?>
                <form name="deleteTrabajador" method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                    <tr>
                        <td><?php echo $empresa->getNombre(); ?></td>
                        <td><?php echo $empresa->getNif(); ?></td>
                        <td><input type="submit" name="eliminarEmpresa" value="Eliminar"></td>
                    </tr>
                    <input type="hidden" name="id" value="<?php echo $empresa->getId(); ?>">
                </form>
                <?php
            }
            ?>
        </table>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function insertCentro(){

    }

    public static function deleteCentro(){

    }
    public static function insertEstado(){
        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
        <form name="insertTrabajador" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
            <fieldset>
              <label>Estado</label><input type="text" name="tipo">
                <input type="submit" name="addEstado" value="añadir">
            </fieldset>
        </form>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function deleteEstado(){
        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $estados = Administracion\Controlador::getAllEstados();
        ?>

        <table>
            <tr>
                <th>ESTADO</th>
                <th>ACCIÓN</th>
            </tr>
            <?php
            foreach($estados as $estado) {
                ?>
                <form name="deleteEstado" method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                    <tr>
                        <td><?php echo $estado->getTipo(); ?></td>
                        <td><input type="submit" name="eliminarEstado" value="Eliminar"></td>
                    </tr>
                    <input type="hidden" name="id" value="<?php echo $estado->getId(); ?>">
                </form>
                <?php
            }
            ?>
        </table>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function insertVehiculo(){
        $centros=Administracion\Controlador::getAllCentros();
        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
        <form name="insertTrabajador" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
            <fieldset>
                <legend>Insertar Vehiculo</legend>
               <select name="centro">
                   <?php
                   foreach($centros as $indice => $valor){
                       ?>
                       <option value="<?php echo $valor->getId()?>"><?php echo $valor->getNombre()?></option>
                       <?php
                   }
                   ?>
               </select>
                <label>Matricula:</label><input type="text" name="matricula">
                <label>Marca:</label><input type="text" name="marca">
                <input type="submit" value="AÑADIR" name="addVehiculo">

            </fieldset>
        </form>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }

    public static function deleteVehiculo(){

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $vehiculos = Controlador\Administracion\Controlador::getAllVehiculos();
        ?>

        <table>
            <tr>
                <th>MATRICULA</th>
                <th>MARCA</th>
                <th>CENTRO</th>
                <th>ACCIÓN</th>
            </tr>
            <?php
            foreach($vehiculos as $vehiculo) {
                ?>
                <form name="deleteEstado" method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                    <tr>
                        <td><?php echo $vehiculo->getMatricula(); ?></td>
                        <td><?php echo $vehiculo->getMarca(); ?></td>
                        <td><?php echo $vehiculo->getCentro()->getNombre(); ?></td>
                        <td><input type="submit" name="eliminarVehiculo" value="Eliminar"></td>
                    </tr>
                    <input type="hidden" name="id" value="<?php echo $vehiculo->getId(); ?>">
                </form>
                <?php
            }
            ?>
        </table>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }
    public static function insertHorasConvenio(){
        $centros=Administracion\Controlador::getAllCentros();
        require_once __DIR__ . "/../Plantilla/cabecera.php";
        ?>
        <form name="insertTrabajador" method="post" action="<?php echo self::getUrlRaiz()?>/Controlador/Administracion/Router.php"><br/>
            <fieldset>
                <legend>Insertar Vehiculo</legend>
                <select name="centro">
                    <?php
                    foreach($centros as $indice => $valor){
                        ?>
                        <option value="<?php echo $valor->getId()?>"><?php echo $valor->getNombre()?></option>
                        <?php
                    }
                    ?>
                </select>
                <label>Numero de horas al año:</label><input type="number" name="horasAnual">
                <label>Denominacion:</label><input type="text" name="denominacion">
                <input type="submit" value="AÑADIR" name="addHorasConvenio">

            </fieldset>
        </form>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";
    }

    public static function deleteHorasConvenio(){

        require_once __DIR__ . "/../Plantilla/cabecera.php";
        $horasconvenio = Controlador\Administracion\Controlador::getAllHorasConvenio();
        ?>

        <table>
            <tr>
                <th>CENTRO</th>
                <th>DENOMINACION</th>
                <th>HORAS</th>
                <th>ACCIÓN</th>
            </tr>
            <?php
            foreach($horasconvenio as $horaconvenio) {
                ?>
                <form name="deleteEstado" method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                    <tr>
                        <td><?php echo $horaconvenio->getCentro()->getNombre(); ?></td>
                        <td><?php echo $horaconvenio->getDenominacion() ?></td>
                        <td><?php echo $horaconvenio->getHorasAnual(); ?></td>
                        <td><input type="submit" name="eliminarHorasConvenio" value="Eliminar"></td>
                    </tr>
                    <input type="hidden" name="id" value="<?php echo $horaconvenio->getId(); ?>">
                </form>
                <?php
            }
            ?>
        </table>
        <?php
        require_once __DIR__ . "/../Plantilla/pie.php";

    }
}



