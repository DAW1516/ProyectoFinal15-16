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
        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$parteLogistica->getTrabajador()->getDni()."',".$parteLogistica->getEstado()->getId().",'".$parteLogistica->getNota()."','".$parteLogistica->getFecha()."')";


        mysqli_query($con, $query) or die("Error addParteLogistica");

        $id=mysqli_insert_id($con);

        parent::desconectar($con);
        return $id;

    }
    public static function getAllByTrabajador($trabajador){

            $conexion=parent::conectar();
            $query="SELECT * FROM ".self::$tabla." WHERE dniTrabajador= '".$trabajador->getDni()."' ";
            $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
            $respuesta=parent::mapearArray($rs,"Partelogistica");
            parent::desconectar($conexion);
            return $respuesta;
    }
    public static function getParteByFecha($trabajador, $fecha){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE fecha= '".$fecha."' AND dniTrabajador= '".$trabajador->getDni()."' ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Partelogistica");
        parent::desconectar($conexion);
        return $respuesta;
    }
    public static function getEstadoParteByFecha($trabajador, $fecha){

        $conexion=parent::conectar();
        $query="SELECT idEstado FROM ".self::$tabla." WHERE fecha= '".$fecha."' AND dniTrabajador= '".$trabajador->getDni()."' ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));


        if ($fila = mysqli_fetch_assoc($rs))
        {

            parent::desconectar($conexion);
            return$fila['idEstado'];
        }
        else{
            parent::desconectar($conexion);
            return null;
        }
    }
    public static function cerrarEstadoParteByFecha($trabajador, $fecha, $nota){

        $conexion=parent::conectar();

        $query="UPDATE ".self::$tabla." SET idEstado=2, nota='".$nota."' WHERE fecha= '".$fecha."' AND dniTrabajador= '".$trabajador->getDni()."'";


        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));


        echo "Parte cerrado";


    }

}