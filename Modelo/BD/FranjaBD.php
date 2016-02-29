<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 12:14
 */

namespace Modelo\BD;

use Modelo\BD;

abstract class FranjaBD extends GenericoBD{

    private static $tabla = "franjas";

    public static function getFranjaByHorarioFranja($horariosFranja){

        return $horariosFranja;

    }

}