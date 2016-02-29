<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 28/02/2016
 * Time: 11:54
 */

require_once  __DIR__ .'/GenericoBD.php';

class partelogisticaBD extends genericoBD{

    private static $tabla="parteslogistica";

    public static function select_by_id($id){

            $conexion=parent::conectar();
            $query="SELECT * FROM ".self::$tabla." WHERE id= '".$id."'";
            $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
            $respuesta=parent::mapear_objeto($rs,"partelogistica");
            parent::desconectar($conexion);
            return $respuesta;
    }

    public static function select_by_viaje($viaje){

            $conexion=parent::conectar();
            $query="SELECT * FROM ".self::$tabla." WHERE id= SELECT idParte FROM viajes WHERE id='".$viaje->getId()."'";
            $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
            $respuesta=parent::mapear_objeto($rs,"partelogistica");
            parent::desconectar($conexion);
            return $respuesta;
    }
    public static function insert($partelogistica){

    }

}