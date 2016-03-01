<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 28/02/2016
 * Time: 11:54
 */
namespace Modelo\BD;

require_once  __DIR__ .'/GenericoBD.php';

abstract class PartelogisticaBD extends GenericoBD{

    private static $tabla="parteslogistica";

    public static function selectParteLogisticaById($id){

            $conexion=parent::conectar();
            $query="SELECT * FROM ".self::$tabla." WHERE id= ".$id." ";
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
    public static function add($parteLogistica){

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$parteLogistica->getTrabajador()->getDni()."','".$parteLogistica->getEstado()->getId()."','".$parteLogistica->getNota()."'";

        mysqli_query($con, $query) or die("Error addCentro");

        parent::desconectar($con);

    }
    public static function getAllByTrabajador($trabajador){

            $conexion=parent::conectar();
            $query="SELECT * FROM ".self::$tabla." WHERE dniTrabajador= ".$trabajador->getDni()." ";
            $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
            $respuesta=parent::mapearArray($rs,"Partelogistica");
            parent::desconectar($conexion);
            return $respuesta;
    }



}