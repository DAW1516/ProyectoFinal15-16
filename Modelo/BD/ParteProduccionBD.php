<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 28/02/2016
 * Time: 20:00
 */
<<<<<<< HEAD
require_once __DIR__."/GenericoBD.php";
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
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
}