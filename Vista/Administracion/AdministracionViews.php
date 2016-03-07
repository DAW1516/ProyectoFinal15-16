<?php
namespace Vista\Administracion;

use \Controlador\Administracion;
use Controlador\Login\Controlador;
    require_once __DIR__ . "/../Plantilla/Views.php";
    require_once __DIR__ . "/../../Controlador/Administracion/Controlador.php";

    abstract class AdministracionViews extends \Vista\Plantilla\Views
    {


        public static function elegir()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            ?>
            <fieldset>
                <legend>Añadir</legend>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertTrabajador.php">Añadir
                    Trabajador</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertEmpresa.php">Añadir
                    Empresa</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertEstado.php">Añadir Estado</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertVehiculo.php">Añadir
                    Vehiculo</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertHorasConvenio.php">Añadir
                    Convenio</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertCentro.php">Añadir Centro</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertTipoFranja.php">Añadir Tipo de
                    Horario</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertHorario.php">Añadir
                    Horario</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/insertHorarioTrabajador.php">Añadir
                    Horario-trabajador</a><br/>

            <br/></fieldset>
            <fieldset>
                <legend>Borrar</legend>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteTrabajador.php">Ver
                    Trabajadores</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteEmpresa.php">Ver Empresas</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteEstado.php">Ver Estados</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteVehiculo.php">Ver
                    Vehiculos</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteHorasConvenio.php">Ver
                    Convenios</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteTipoFranja.php">Ver Tipos de
                    Horarios</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteCentro.php">Borrar Centro</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteHorario.php">Borrar
                    Horario</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/deleteHorarioTrabajador.php">Borrar
                    Horario Trabajador</a><br/>

                <br/></fieldset>
            <fieldset>
                <legend>Modificar</legend>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/updateTipoFranja.php">Modificar Tipos de
                    Horarios</a><br/>
                <a href="<?php echo self::getUrlRaiz() ?>/Vista/Administracion/updateHorasConvenio.php">Modificar Horas
                    de Convenios</a><br/>
                <br/></fieldset>

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
            <form name="insertTrabajador" method="post"
                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Añadir Trabajador</legend>
                    <label></label><input type="text" name="dni" placeholder="Dni"><br/>
                    <label></label><input type="text" name="nombre" placeholder="Nombre"><br/>
                    <label></label><input type="text" name="apellido1" placeholder="Apellido 1"><br/>
                    <label></label><input type="text" name="apellido2" placeholder="Apellido 2"><br/>
                    <label></label><input type="text" name="telefono" placeholder="Telefono"><br/>
                    <label></label><select name="empresa">
                        <?php
                        foreach ($empresas as $empresa) {

                            ?>
                            <option
                                value="<?php echo $empresa->getId(); ?>"><?php echo $empresa->getNombre(); ?></option>
                            <?php
                        }
                        ?>
                    </select><br/>
                    <select name="centro">
                        <?php
                        foreach ($empresas as $empresa) {
                            foreach ($empresa->getCentros() as $centro) {
                                ?>
                                <option
                                    value="<?php echo $centro->getId(); ?>"><?php echo $centro->getNombre(); ?></option>
                                <?php
                            }
                        }
                        ?>
                    </select><br/>
                    <select name="perfil">
                        <?php
                        for ($x = 0; $x < sizeof($perfiles); $x++) {
                            ?>
                            <option value="<?php echo $perfiles[$x][1] ?>"><?php echo $perfiles[$x][1] ?></option>
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

        public static function deleteTrabajador()
        {

            parent::setOn(true);
            parent::setRoot(true);

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
                foreach ($trabajadores as $trabajador) {
                    ?>
                    <form name="deleteTrabajador" method="post"
                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                        <tr>
                            <td><?php echo $trabajador->getDni(); ?></td>
                            <td><?php echo $trabajador->getNombre(); ?></td>
                            <td><?php echo $trabajador->getApellido1() . " " . $trabajador->getApellido2(); ?></td>
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

        public static function insertEmpresa()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            ?>
            <form name="insertTrabajador" method="post"
                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Añadir Empresa</legend>
                    <label></label><input type="text" name="nombre" placeholder="Nombre"><br/>
                    <label></label><input type="text" name="nif" placeholder="Nif"><br/>
                    <input type="submit" name="addEmpresa" value="Añadir">
                </fieldset>
            </form>
            <?php
            require_once __DIR__ . "/../Plantilla/pie.php";

        }

        public static function deleteEmpresa()
        {

            parent::setOn(true);
            parent::setRoot(true);

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
                foreach ($empresas as $empresa) {
                    ?>
                    <form name="deleteTrabajador" method="post"
                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
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

        public static function insertCentro()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $empresas = \Modelo\BD\EmpresaBD::getAll();
            $centros = \Modelo\BD\CentroBD::getAll();
            ?>
            <form name="insertCentro" method="post"
                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Añadir Centro</legend>
                    <label></label><input type="text" name="nombre" placeholder="Nombre"><br/>
                    <label></label><input type="text" name="localizacion" placeholder="Localizacion"><br/>
                    <label></label><select name="empresa">
                        <?php
                        foreach ($empresas as $empresa) {
                            ?>
                            <option
                                value="<?php echo $empresa->getId(); ?>"><?php echo $empresa->getNombre(); ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <input type="submit" name="addCentro" value="Añadir">
                </fieldset>
            </form>

            <?php
            require_once __DIR__ . "/../Plantilla/pie.php";
        }

        public static function deleteCentro()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $centros = \Modelo\BD\CentroBD::getAll();
            ?>
            <table>
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
                            <td><input type="submit" name="eliminarCentro" value="Eliminar"></td>
                        </tr>
                        <input type="hidden" name="id" value="<?php echo $centro->getId(); ?>">
                    </form>
                    <?php
                }
                ?>
            </table>
            <?php
            require_once __DIR__ . "/../Plantilla/pie.php";
        }


        public static function insertEstado()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            ?>
            <form name="insertTrabajador" method="post"
                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <label>Estado</label><input type="text" name="tipo">
                    <input type="submit" name="addEstado" value="añadir">
                </fieldset>
            </form>
            <?php
            require_once __DIR__ . "/../Plantilla/pie.php";

        }

        public static function deleteEstado()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $estados = Administracion\Controlador::getAllEstados();
            ?>

            <table>
                <tr>
                    <th>ESTADO</th>
                    <th>ACCIÓN</th>
                </tr>
                <?php
                foreach ($estados as $estado) {
                    ?>
                    <form name="deleteEstado" method="post"
                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
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

        public static function insertVehiculo()
        {

            parent::setOn(true);
            parent::setRoot(true);

            $centros = Administracion\Controlador::getAllCentros();
            require_once __DIR__ . "/../Plantilla/cabecera.php";
            ?>
            <form name="insertTrabajador" method="post"
                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Insertar Vehiculo</legend>
                    <select name="centro">
                        <?php
                        foreach ($centros as $indice => $valor) {
                            ?>
                            <option value="<?php echo $valor->getId() ?>"><?php echo $valor->getNombre() ?></option>
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

        public static function deleteVehiculo()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $vehiculos = Administracion\Controlador::getAllVehiculos();
            ?>

            <table>
                <tr>
                    <th>MATRICULA</th>
                    <th>MARCA</th>
                    <th>CENTRO</th>
                    <th>ACCIÓN</th>
                </tr>
                <?php
                foreach ($vehiculos as $vehiculo) {
                    ?>
                    <form name="deleteEstado" method="post"
                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
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

        public static function insertHorasConvenio()
        {

            parent::setOn(true);
            parent::setRoot(true);

            $centros = Administracion\Controlador::getAllCentros();
            require_once __DIR__ . "/../Plantilla/cabecera.php";
            ?>
            <form name="insertHorasConvenio" method="post"
                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Añadir Horas Convenio</legend>
                    <select name="centro">
                        <?php
                        foreach ($centros as $indice => $valor) {
                            ?>
                            <option value="<?php echo $valor->getId() ?>"><?php echo $valor->getNombre() ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <label>Numero horas anuales:</label><input type="number" name="horasAnual">
                    <label>Denominación:</label><input type="text" name="denominacion">
                    <input type="submit" value="AÑADIR" name="addHorasConvenio">

                </fieldset>
            </form>
            <?php
            require_once __DIR__ . "/../Plantilla/pie.php";
        }

        public static function deleteHorasConvenio()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $horasconvenio = Administracion\Controlador::getAllHorasConvenio();
            ?>

            <table>
                <tr>
                    <th>CENTRO</th>
                    <th>DENOMINACION</th>
                    <th>HORAS</th>
                    <th>ACCIÓN</th>
                </tr>
                <?php
                foreach ($horasconvenio as $horaconvenio) {
                    ?>
                    <form name="deleteHorasConvenio" method="post"
                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
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

        public static function updateTipoFranja()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $tipos = Administracion\Controlador::getAllTiposFranjas();
            ?>

            <table>
                <tr>
                    <th>TIPO</th>
                    <th>PRECIO</th>
                    <th>NUEVO PRECIO</th>
                    <th>ACCIÓN</th>
                </tr>
                <?php
                foreach ($tipos as $tipo) {
                    ?>
                    <form name="deleteEstado" method="post"
                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                        <tr>
                            <td><?php echo $tipo->getTipo(); ?></td>
                            <td><?php echo $tipo->getPrecio(); ?></td>
                            <td><input type="text" name="nuevo" size="5" placeholder="00.00"></td>
                            <td><input type="submit" name="updateTipoFranja" value="Editar"></td>
                        </tr>
                        <input type="hidden" name="id" value="<?php echo $tipo->getId(); ?>">
                    </form>
                    <?php
                }
                ?>
            </table>
            <?php
            require_once __DIR__ . "/../Plantilla/pie.php";

        }

        public static function insertTipoFranja()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            ?>
            <form name="insertTipoFranja" method="post"
                  action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php"><br/>
                <fieldset>
                    <legend>Insertar Tipo</legend>
                    <label>Tipo de Horario Genérico:</label><input type="text" name="tipo"
                                                                   placeholder="mañana, tarde, noche,...">
                    <label>Precio:</label><input type="text" name="precio" placeholder="20.15" size="5">
                    <input type="submit" value="Añadir" name="addTipoFranja">

                </fieldset>
            </form>
            <?php
            require_once __DIR__ . "/../Plantilla/pie.php";

        }

        public static function deleteTipoFranja()
        {

            parent::setOn(true);
            parent::setRoot(true);

            require_once __DIR__ . "/../Plantilla/cabecera.php";
            $tipos = Administracion\Controlador::getAllTiposFranjas();
            ?>

            <table>
                <tr>
                    <th>TIPO</th>
                    <th>PRECIO</th>
                    <th>ACCIÓN</th>
                </tr>
                <?php
                foreach ($tipos as $tipo) {
                    ?>
                    <form name="deleteEstado" method="post"
                          action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                        <tr>
                            <td><?php echo $tipo->getTipo(); ?></td>
                            <td><?php echo $tipo->getPrecio(); ?></td>
                            <td><input type="submit" name="deleteTipoFranja" value="Eliminar"></td>
                        </tr>
                        <input type="hidden" name="id" value="<?php echo $tipo->getId(); ?>">
                    </form>
                    <?php
                }
                ?>
            </table>
            <?php
            require_once __DIR__ . "/../Plantilla/pie.php";

        }

        public static function updateHorasConvenio()
        {

            parent::setOn(true);
            parent::setRoot(true);

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
            <label>DNI: </label><input type="text" name="dni" size="10">
            <button type="button" id="buscar" style="border: none; background: none"><span
                    class="glyphicon glyphicon-search" style="color:black; font-size: 1.5em"></span></button>
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
                    ?>
                    <form method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                        <tr>
                            <td><?php echo $log->getTrabajador()->getDni(); ?></td>
                            <td><?php echo $log->getFecha(); ?></td>
                            <td><?php echo $log->getNota(); ?></td>
                            <td><?php echo $log->getEstado()->getTipo(); ?></td>
                            <td>
                                <?php if ($log->getEstado()->getTipo() != "validado") {
                                    ?>
                                    <button type="submit" name="validarParteLogistica" style="border: none; background: none"><span
                                            class="glyphicon glyphicon-ok" style="color:green; font-size: 1.5em"></span></button>
                                    <button type="submit" name="eliminarParteLogistica" style="border: none; background: none"><span
                                            class="glyphicon glyphicon-remove" style="color:red; font-size: 1.5em"></button>
                                    <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <input type="hidden" name="id" value="<?php echo $log->getId(); ?>">
                    </form>
                    <?php
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
                    ?>
                    <form  method="post" action="<?php echo self::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
                        <tr>
                            <td><?php echo $prod->getTrabajador()->getDni(); ?></td>
                            <td><?php echo $prod->getFecha(); ?></td>
                            <td><?php echo $prod->getIncidencia(); ?></td>
                            <td><?php echo $prod->getAutopista(); ?></td>
                            <td><?php echo $prod->getDieta(); ?></td>
                            <td><?php echo $prod->getOtroGasto(); ?></td>
                            <td><?php echo $prod->getEstado()->getTipo(); ?></td>
                            <td>
                                <?php if ($prod->getEstado()->getTipo() != "validado") {
                                    ?>
                                    <button type="submit" name="validarParteProduccion" style="border: none; background: none"><span
                                            class="glyphicon glyphicon-ok" style="color:green; font-size: 1.5em"></span></button>
                                    <button type="submit" name="eliminarParteProduccion" style="border: none; background: none"><span
                                            class="glyphicon glyphicon-remove" style="color:red; font-size: 1.5em"></button>
                                    <?php
                                }
                                ?>

                            </td>
                        </tr>
                        <input type="hidden" name="id" value="<?php echo $prod->getId(); ?>">
                    </form>
                    <?php
                }
                ?>
            </table>
            <?php
            require_once __DIR__ . "/../Plantilla/pie.php";
        }

    }




