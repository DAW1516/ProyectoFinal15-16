<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 2/3/16
 * Time: 9:44
 */

namespace Controlador\Administracion;


require_once __DIR__.'/Controlador.php';




if(isset($_POST['addTrabajador'])){

Controlador::insertarTrabajador($_POST);

}