<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 28/02/2016
 * Time: 20:00
 */
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

    public static function update($parteId){
        $conexion = GenericoBD::conectar();

        $update = "UPDATE ".self::$tabla." SET idEstado = '3' WHERE id = '".$parteId."';";

        mysqli_query($conexion,$update) or die("Error UpdateParteProduccion");

        GenericoBD::desconectar($conexion);
    }

    public static function delete($parteId,$idEstado){
        $conexion = GenericoBD::conectar();

        $query = "DELETE FROM ".self::$tabla." WHERE id = ".$parteId;

        mysqli_query($conexion,$query) or die("Error DeleteParteProduccion");

        GenericoBD::desconectar($conexion);
    }
    public static function getAll(){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." order by fecha,dniTrabajador";

        $rs = mysqli_query($con, $query) or die("Error getAllPartes");

        $partes = parent::mapearArray($rs, "ParteProduccion");

        parent::desconectar($con);

        return $partes;

    }
}