<?php
namespace Controlador\Produccion;
use Vista\Plantilla;
require_once __DIR__."/../../Vista/Plantilla/Views.php";
require_once __DIR__."/Controlador.php";

/**
 * Created by PhpStorm.
 * User: Mikel
 * Date: 3/3/16
 * Time: 10:05
 */
if(isset($_POST["enviar"])){
    switch($_POST["cod"]){
        case 1:

            if(empty($_POST["numeroHoras"])){$_POST["numeroHoras"]=null;}
            if(empty($_POST["paquetesEntrada"])){$_POST["paquetesEntrada"]=null;}
            if(empty($_POST["paquetesSalida"])){$_POST["paquetesSalida"]=null;}

            Controlador::revisarParte($_POST);
            break;
    }
}else{
    header("Location:".Plantilla\Views::getUrlRaiz()."/Vista/Produccion/Calendario.php");
}
?>
