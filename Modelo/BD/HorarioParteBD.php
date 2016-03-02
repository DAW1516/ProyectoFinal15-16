<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 29/02/2016
 * Time: 12:09
 */

namespace Modelo\BD;
<<<<<<< HEAD
<<<<<<< HEAD
require_once __DIR__."/GenericoBD.php";


abstract class HorarioParteBD extends GenericoBD
=======


abstract class HorarioParteBD
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
require_once __DIR__."/GenericoBD.php";


abstract class HorarioParteBD extends GenericoBD
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
{

    private static $tabla="horariopartes";

    public static function getHorarioParteByParte($parte){


        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE idParte= ".$parte->getId();

        $rs = mysqli_query($con, $query) or die("Error getHorarioParteByParte");

        $horariosParte = parent::mapear($rs, "HorarioParte");

        return  $horariosParte;
    }
    public static function getHorarioParteById($horarioParteId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$horarioParteId;

        $rs = mysqli_query($con, $query) or die("Error getHorarioParteById");

        $centros = parent::mapear($rs, "HorarioParte");

        parent::desconectar($con);

        return $centros;

    }

    public static function save($horarioParte){

        $conexion = GenericoBD::conectar();

        $insert = "INSERT INTO ".self::$tabla." VALUES (null,'".$horarioParte->getHoraEntrada()."','".$horarioParte->getHoraSalida()."','".$horarioParte->getParteProduccion()->getId()."');";

        mysqli_query($conexion,$insert) or die("Error InsertHorarioParte");

        GenericoBD::desconectar($conexion);

    }

    public static function update($horarioParte){
        $conexion = GenericoBD::conectar();

        $update = "UPDATE ".self::$tabla." SET entrada='".$horarioParte->getHoraEntrada()."', salida='".$horarioParte->getHoraSalida()."';";
        mysqli_query($conexion,$update) or die("Error UpdateHorarioParte");

        GenericoBD::desconectar($conexion);
    }

    public static function delete($horarioParte){
        $conexion = GenericoBD::conectar();

        $delete = "DELETE FROM ".self::$tabla." WHERE id = '".$horarioParte->getId()."';";

        mysqli_query($conexion,$delete) or die("Error DeleteHorarioParte");

        GenericoBD::desconectar($conexion);
    }
    
}