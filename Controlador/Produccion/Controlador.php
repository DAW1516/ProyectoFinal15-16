<?php
namespace Controlador\Produccion;
/**
 * Created by PhpStorm.
 * User: Ruben
 * Date: 2/3/16
 * Time: 12:03
 */

use Modelo\BD\TareaBD;

require_once __DIR__.'/../../Modelo/BD/RequiresBD.php';
class Controlador
{
    public static function getAllTareas(){
        return TareaBD::getAll();
    }

}

?>