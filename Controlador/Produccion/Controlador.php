<?php
namespace Controlador\Produccion;
use Modelo\Base;
use Modelo\BD\TipoTareaBD;

require_once __DIR__."/../../Modelo/BD/TipoTareaBD.php";
/**
 * Created by PhpStorm.
 * User: Mikel
 * Date: 2/3/16
 * Time: 19:17
 */
class Controlador
{
    public static function getTareasSelect(){

        return TipoTareaBD::getAll();

    }
}

?>