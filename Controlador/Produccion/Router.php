<?php
namespace Controlador\Produccion;
use Vista\Plantilla;
require_once __DIR__."/../../Vista/Plantilla/Views.php";
/**
 * Created by PhpStorm.
 * User: Mikel
 * Date: 2/3/16
 * Time: 12:00
 */
if(isset($_POST["enviar"])){

}else{
    header("Location:".Plantilla\Views::getUrlRaiz()."/Vista/Produccion/Calendario.php");
}

?>
