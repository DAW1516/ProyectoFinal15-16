<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 12:42
 */

namespace Modelo\BD;

use Modelo\Base;
require_once __DIR__."/GenericoBD.php";

abstract class HorarioTrabajadorBD extends GenericoBD{

    private static $tabla="horariostrabajador";

    public static function getHorarioTrabajadorByTrabajador($trabajador){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE dniTrbajador= ".$trabajador->getDni()." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"HorarioTrabajador");
        parent::desconectar($conexion);
        return $respuesta;

    }


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