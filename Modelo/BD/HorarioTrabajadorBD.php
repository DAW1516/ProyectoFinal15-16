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

    private static $tabla = "horarioTrabajadores";


    public static function getHorarioTrabajadorById($trabajadorId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$trabajadorId;

        $rs = mysqli_query($con, $query) or die("Error getCentrosByEmpresa");

        $horarioTrabajador = parent::mapear($rs, "HorarioTrabajador");

        parent::desconectar($con);

        return $horarioTrabajador;

    }

    public static function add($horarioTrabajador){

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$horarioTrabajador->getId()."','".$horarioTrabajador->getTrabajador()->getDni()."','".$horarioTrabajador->getHorario()->getId()."','".$horarioTrabajador->getNumeroSemana()."')";

        mysqli_query($con, $query) or die("Error addCentro");

        parent::desconectar($con);
    }

}