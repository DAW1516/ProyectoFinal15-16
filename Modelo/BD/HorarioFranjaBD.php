<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 12:28
 */
namespace Modelo\BD;

use Modelo\Base;

abstract class HorarioFranjaBD extends GenericoBD{

    private static $tabla = "horariosFranja";

    public static function getHorariosFranjaByHorario($horario){
        return $horario;
    }

}