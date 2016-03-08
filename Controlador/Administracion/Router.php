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

$gestionListas = "Location: ".Views::getUrlRaiz()."/Vista/Administracion/Administracion.php?cod=1";

if(isset($_POST['addTrabajador'])){
    $file = $_FILES;
    Controlador::insertarTrabajador($_POST, $file);
    header($gestionListas);
}

if(isset($_POST['addEmpresa'])){
    Controlador::insertarEmpresa($_POST);
    header($gestionListas);
}

if(isset($_POST['eliminarEmpresa'])){
    Controlador::deleteEmpresa($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteEmpresa.php");
}
if(isset($_POST['addEstado'])){
    Controlador::AddEstado($_POST);
    header($gestionListas);
}
if(isset($_POST['eliminarEstado'])){
    echo "hola";    Controlador::deleteEstado($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteEstado.php");
}
if(isset($_POST['addVehiculo'])){
    Controlador::AddVehiculo($_POST);
    header($gestionListas);
    }
if(isset($_POST['eliminarVehiculo'])){

    Controlador::deleteVehiculo($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteVehiculo.php");
}
if(isset($_POST['addHorasConvenio'])){
    Controlador::AddHorasConvenio($_POST);
    header($gestionListas);
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
    header($gestionListas);
}

if(isset($_POST['eliminarCentro'])){
    Controlador::DeleteCentro($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteCentro.php");
}
if(isset($_POST['addHorario'])){
    Controlador::AddHorario($_POST);
    header($gestionListas);
}

if(isset($_POST['eliminarHorario'])){
    Controlador::DeleteHorario($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteHorario.php");

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
    header($gestionListas);
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
if(isset($_POST['updatePassword'])){
    Controlador::updatePassword($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/updatePassword.php");
}
if(isset($_POST['añadirFestivo'])){
    Controlador::addFestivo($_POST);
    header($gestionListas);
   }
if(isset($_POST['deleteFestivo'])){
    Controlador::deleteFestivo($_POST);
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteFestivo.php");
}
if(isset($_POST['volver'])){
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/Administracion.php?cod=1");
}
