<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 28/02/2016
 * Time: 20:00
 */
require_once __DIR__."/GenericoBD.php";
abstract class ParteProduccionBD extends GenericoBD
{
    private static $tabla = "partesproduccion";

    public static function getAllByTrabajador($trabajador){

        $conexion = GenericoBD::conectar();

        $select = "SELECT * FROM '".self::$tabla."' WHERE dniTrabajador = '".$trabajador->getDni()."';";

        $resultado = mysqli_query($conexion,$select);

        $partes = GenericoBD::mapearArray($resultado,"ParteProduccion");

        GenericoBD::desconectar($conexion);

        return $partes;
    }

    public static function getParteByFecha($trabajador,$fechaSemana){
        $conexion = GenericoBD::conectar();

        $select = "SELECT * FROM '".self::$tabla."' WHERE dniTrabajador = '".$trabajador->getDni()."' AND fecha > '".$fechaSemana."';";

        $resultado = mysqli_query($conexion,$select);

        $partes = GenericoBD::mapearArray($resultado,"ParteProduccion");


        GenericoBD::desconectar($conexion);

        return $partes;
    }

    public static function getParteByHorarioParte($horarioparte){
        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id= ".$horarioparte->getParteProduccion()->getId();

        $rs = mysqli_query($con, $query) or die("Error getParteByHorarioParte");

        $horariosParte = parent::mapear($rs, "ParteProduccion");

        parent::desconectar($con);

        return $horariosParte;

    }

    public static function save($parteProduccion){

        $conexion = GenericoBD::conectar();

        $insert = "INSERT INTO ".self::$tabla." VALUES (null,'".$parteProduccion->getFecha()."','".$parteProduccion->getIncidencia()."','".$parteProduccion->getAutopista()."','".$parteProduccion->getDieta()."','".$parteProduccion->getOtroGasto()."','".$parteProduccion->getEstado()->getId()."','".$parteProduccion->getTrabajador()->getDni()."');";

        mysqli_query($conexion,$insert) or die("Error InsertParteProduccion");

        GenericoBD::desconectar($conexion);

    }

    public static function update($parteProduccion){
        $conexion = GenericoBD::conectar();

        $update = "UPDATE ".self::$tabla." SET incidencia='".$parteProduccion->getIncidencia()."', autopista='".$parteProduccion->getAutopista()."', dieta='".$parteProduccion->getDieta()."', otroGasto='".$parteProduccion->getOtroGasto()."', idEstado='".$parteProduccion->getEstado()->getId()."' WHERE id = '".$parteProduccion->getId()."';";

        mysqli_query($conexion,$update) or die("Error UpdateParteProduccion");

        GenericoBD::desconectar($conexion);
    }

    public static function delete($parteProduccion){
        $conexion = GenericoBD::conectar();

        $delete = "DELETE FROM ".self::$tabla." WHERE id = '".$parteProduccion->getId()."';";

        mysqli_query($conexion,$delete) or die("Error DeleteParteProduccion");

        GenericoBD::desconectar($conexion);
    }
}