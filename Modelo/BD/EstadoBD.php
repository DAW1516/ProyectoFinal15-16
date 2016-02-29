<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 27/02/2016
 * Time: 14:55
 */

require_once __DIR__ .'/GenericoBD.php';

class estadoBD extends genericoBD{

    private static $tabla="estados";

    public static function select_estado_by_id($id){
        //funciona
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= '".$id."'";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear_objeto($rs,"estado");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function  select_estado_by_partelogistica($partelogistica){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= SELECT idEstado FROM parteslogistica WHERE id='".$partelogistica->getId()."'";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear_objeto($rs,"estado");
        parent::desconectar($conexion);
        return $respuesta;
    }
}