<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 12:42
 */

namespace Modelo\BD;

use Modelo\Base;

abstract class HorarioTrabajadorBD extends GenericoBD{

    public static function getHorarioTrabajadorByTrabajador($trabajador){

        return $trabajador;

    }

}