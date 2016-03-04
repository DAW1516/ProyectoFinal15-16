<?php

/**
 * Created by PhpStorm.
 * User: Mikel
 * Date: 3/3/16
 * Time: 18:16
 */
use Modelo\Base;
require_once __DIR__."/Modelo/Base/ProduccionClass.php";

function cargarDatos(){
    $worker = new Base\Produccion("11111111A","Mikel","Ereño","Estivariz","111111111",1,1,null,null,null);
    unset($_SESSION["trabajador"]);
    $_SESSION["trabajador"]=serialize($worker);

}
?>
