<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 28/02/2016
 * Time: 11:54
 */
namespace Modelo\BD;

require_once  __DIR__ .'/GenericoBD.php';

class PartelogisticaBD extends GenericoBD{

    private static $tabla="parteslogistica";

    public static function selectParteLogisticaById($id){

            $conexion=parent::conectar();
            $query="SELECT * FROM ".self::$tabla." WHERE id= '".$id."'";
            $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
            $respuesta=parent::mapear($rs,"Partelogistica");
            parent::desconectar($conexion);
            return $respuesta;
    }

    public static function selectParteLogisticaByViaje($viaje){

            $conexion=parent::conectar();
            $query="SELECT * FROM ".self::$tabla." WHERE id= SELECT idParte FROM viajes WHERE id='".$viaje->getId()."'";
            $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
            $respuesta=parent::mapear($rs,"Partelogistica");
            parent::desconectar($conexion);
            return $respuesta;
    }
    public static function add($partelogistica){

    }
    public static function getAllByTrabajador($trabajador){}

}