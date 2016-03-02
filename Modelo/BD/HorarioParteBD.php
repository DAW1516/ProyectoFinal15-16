<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 29/02/2016
 * Time: 12:09
 */

namespace Modelo\BD;
<<<<<<< HEAD
require_once __DIR__."/GenericoBD.php";


abstract class HorarioParteBD extends GenericoBD
=======


abstract class HorarioParteBD
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
{

    private static $tabla="horariosParte";

    public static function getHorarioParteByParte($parte){


        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE idParte= ".$parte->getId();

        $rs = mysqli_query($con, $query) or die("Error getHorarioParteByParte");

        $horariosParte = parent::mapear($rs, "HorarioParte");

    }
    public static function getHorarioParteById($horarioParteId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$horarioParteId;

        $rs = mysqli_query($con, $query) or die("Error getHorarioParteById");

        $centros = parent::mapear($rs, "HorarioParte");

        parent::desconectar($con);

        return $centros;

    }

    public static function add($horarioParte){//codificar el insert no estoy seguro

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$horarioParte->get."','".$horarioParte->get."','".$horarioParte->get."')";

        mysqli_query($con, $query) or die("Error addHorarioParte");


        parent::desconectar($con);

    }
    
}