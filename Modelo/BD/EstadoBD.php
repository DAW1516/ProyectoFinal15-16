<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 27/02/2016
 * Time: 14:55
 */
namespace Modelo\BD;

require_once __DIR__ .'/GenericoBD.php';

abstract class EstadoBD extends GenericoBD{

    private static $tabla="estados";

    public static function selectEstadoById($id){
        //funciona
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= '".$id."'";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function  selectEstadoByParteLogistica($partelogistica){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= SELECT idEstado FROM parteslogistica WHERE id='".$partelogistica->getId()."'";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"estado");
        parent::desconectar($conexion);
        return $respuesta;
    }
}