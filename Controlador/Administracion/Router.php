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
    header("Location: ".Views::getUrlRaiz()."/index.php");
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
