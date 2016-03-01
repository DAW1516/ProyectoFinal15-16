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
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= (SELECT idFranja FROM horario WHERE id=".$horario->getId().")";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"HorariosFranja");
        parent::desconectar($conexion);
        return $respuesta;
    }
    public static function getHorariosFranjaById($id){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$id." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"HorarioFranja");
        parent::desconectar($conexion);
        return $respuesta;
    }

}