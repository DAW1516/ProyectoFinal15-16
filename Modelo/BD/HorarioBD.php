<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 12:36
 */

namespace Modelo\BD;

use Modelo\Base;

abstract class HorarioBD extends GenericoBD{

    private static $tabla = "horarios";

    public static function getHorarioByHorarioTrabajador($horarioTrabajador){

        return $horarioTrabajador;

    }

}