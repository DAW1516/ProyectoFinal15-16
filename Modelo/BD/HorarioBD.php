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

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= (SELECT idFranja FROM horariostrabajador WHERE id=".$horarioTrabajador->getId().")";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Horario");
        parent::desconectar($conexion);
        return $respuesta;

    }


    public static function getHorarioById($horarioId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$horarioId;

        $rs = mysqli_query($con, $query) or die("Error getHorarioById");

        $horario = parent::mapear($rs, "Horario");

        parent::desconectar($con);

        return $horario;

    }
}