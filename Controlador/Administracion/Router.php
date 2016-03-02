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
}

if(isset($_POST['addEmpresa'])){
    Controlador::insertarEmpresa($_POST);
}

if(isset($_POST['eliminarEmpresa'])){
    Controlador::deleteEmpresa($_POST);
    //headerLocation a vista Eliminar
    header("Location: ".Views::getUrlRaiz()."/Vista/Administracion/deleteEmpresa.php");
}