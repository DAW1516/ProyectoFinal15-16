<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 28/02/2016
 * Time: 20:16
 */
<<<<<<< HEAD
<<<<<<< HEAD
require_once __DIR__."/GenericoBD.php";
abstract class TipoTareaBD extends GenericoBD
=======
abstract class TipoTareaBD
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
require_once __DIR__."/GenericoBD.php";
abstract class TipoTareaBD extends GenericoBD
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
{
    private static $table = "tipostareas";
    public static function getTipoByTarea($tarea){

        $conexion = parent::conectar();

        $query ="Select * from ".self::$table."where id=".$tarea->getTipoTarea()->getId();

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $tipo= parent::mapear($rs, "TipoTarea");

        return $tipo;

    }
    public static function insert($tipoTarea){

        $conexion = GenericoBD::conectar();

        $insert = "INSERT INTO ".self::$tabla." VALUES (null,'".$tipoTarea->getDescripcion()."'".";)";

        mysqli_query($conexion,$insert) or die("Error InsertTipoTarea");

        GenericoBD::desconectar($conexion);

    }

    public static function update($tipoTarea){
        $conexion = GenericoBD::conectar();

        $update = "UPDATE ".self::$tabla." SET descripcion='".$tipoTarea->getDescripcion()."' WHERE id = '".$tipoTarea->getId()."';";
        mysqli_query($conexion,$update) or die("Error UpdateTipoTarea");

        GenericoBD::desconectar($conexion);
    }

    public static function delete($tipoTarea){
        $conexion = GenericoBD::conectar();

        $delete = "DELETE FROM ".self::$tabla." WHERE id = '".$tipoTarea->getId()."';";

        mysqli_query($conexion,$delete) or die("Error DeleteTipoTarea");

        GenericoBD::desconectar($conexion);
    }

}