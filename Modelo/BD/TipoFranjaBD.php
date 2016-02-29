<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:59
 */

namespace Modelo\BD;

abstract class TipoFranjaBD extends GenericoBD{

    private static $tabla = "tiposFranjas";

    public static function getTipoFranjaByFranja($franja){

        return $franja;

    }

}