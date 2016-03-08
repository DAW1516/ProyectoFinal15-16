<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 2/3/16
 * Time: 9:44
 */

namespace Controlador\Administracion;

use Vista\Plantilla\Views;

require_once __DIR__."/../../Vista/Plantilla/Views.php";

require_once __DIR__.'/Controlador.php';

if(isset($_POST['addTrabajador'])){
    Controlador::insertarTrabajador($_POST);
    header("Location: ".Views::getUrlRaiz()."/index.php");
}

if(isset($_POST['addEmpresa'])){
    Controlador::insertarEmpresa($_POST);
    header("Location: ".Views::getUrlRaiz()."/index.php");
}

if(isset($_POST['eliminarEmpresa'])){
    Controlador::deleteEmpresa($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteEmpresa.php");
}
if(isset($_POST['addEstado'])){
    Controlador::AddEstado($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/insertEstado.php");
}
if(isset($_POST['eliminarEstado'])){
    echo "hola";    Controlador::deleteEstado($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteEstado.php");
}
if(isset($_POST['addVehiculo'])){
    Controlador::AddVehiculo($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/insertVehiculo.php");
}
if(isset($_POST['eliminarVehiculo'])){

    Controlador::deleteVehiculo($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteVehiculo.php");
}
if(isset($_POST['addHorasConvenio'])){
    Controlador::AddHorasConvenio($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/insertHorasConvenio.php");
}
if(isset($_POST['eliminarHorasConvenio'])){

    Controlador::deleteHorasConvenio($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteHorasConvenio.php");
}
if(isset($_POST['eliminarTrabajador'])){
    Controlador::deleteTrabajador($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteTrabajador.php");
}
if(isset($_POST['addCentro'])){
    Controlador::AddCentro($_POST);
    header("Location: ".Views::getUrlRaiz()."/index.php");
}

if(isset($_POST['eliminarCentro'])){
    Controlador::DeleteCentro($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteCentro.php");
}
if(isset($_POST['addHorario'])){
    Controlador::AddHorario($_POST);
}

if(isset($_POST['eliminarHorario'])){
    Controlador::DeleteHorario($_POST);
}
if(isset($_POST['updateTipoFranja'])){
    Controlador::UpdateTipoFranja($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/updateTipoFranja.php");
}
if(isset($_POST['addTipoFranja'])){
    Controlador::addTipoFranja($_POST);
    header("Location: ".Views::getUrlRaiz()."/index.php");
}
if(isset($_POST['deleteTipoFranja'])){
    Controlador::DeleteTipoFranja($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteTipoFranja.php");
}
if(isset($_POST['updateHorasConvenio'])){
    Controlador::UpdateHorasConvenio($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/updateHorasConvenio.php");
}
if(isset($_POST['añadirHorarioTrabajador'])){
    Controlador::addHorarioTrabajador($_POST);
}
if(isset($_POST['borrarHorarioTrabajador'])){
    Controlador::DeleteHorarioTrabajador($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteHorarioTrabajador.php");
}
if(isset($_POST['eliminarParteLogistica'])){
    Controlador::DeleteParteLogistica($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/Administracion.php?cod=2");
}
if(isset($_POST['eliminarParteProduccion'])){
    Controlador::DeleteParteProduccion($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/Administracion.php?cod=2");
}
if(isset($_POST['validarParteLogistica'])){
    Controlador::updateParteLogistica($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/Administracion.php?cod=2");
}
if(isset($_POST['validarParteProduccion'])){
    Controlador::updateParteProduccion($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/Administracion.php?cod=2");
}
if(isset($_POST['añadirFestivo'])){
    Controlador::addFestivo($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/Administracion.php?cod=1");
}
if(isset($_POST['deleteFestivo'])){
    Controlador::deleteFestivo($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteFestivo.php");
}
if(isset($_POST['dni'])){
    $perfil = Controlador::getPerfilbyDni($_POST['dni']);
    $partes = Controlador::getParte($_POST['dni'],$perfil);
    if($perfil == "Logistica"){
    ?>
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
        foreach ($partes as $log) {
            ?>
            <form method="post" action="<?php echo Views::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
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
        <?php
        }
        elseif($perfil == "Produccion") {
            ?>
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
                foreach ($partes as $prod) {
                    ?>
                    <form method="post" action="<?php echo Views::getUrlRaiz() ?>/Controlador/Administracion/Router.php">
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
                                    <button type="submit" name="validarParteProduccion"
                                            style="border: none; background: none"><span
                                            class="glyphicon glyphicon-ok" style="color:green; font-size: 1.5em"></span>
                                    </button>
                                    <button type="submit" name="eliminarParteProduccion"
                                            style="border: none; background: none"><span
                                            class="glyphicon glyphicon-remove" style="color:red; font-size: 1.5em">
                                    </button>
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
        }
}
