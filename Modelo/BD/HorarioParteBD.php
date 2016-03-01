<?php
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 29/02/2016
 * Time: 12:09
 */

namespace Modelo\BD;


abstract class HorarioParteBD
{
    private static $tabla = "horariopartes";

    public static function getHorarioParteByParte($parte){


        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE idParte= ".$parte->getId();

        $rs = mysqli_query($con, $query) or die("Error getHorarioParteByParte");

        $horariosParte = parent::mapear($rs, "HorarioParte");

        parent::desconectar($con);

        return $horariosParte;
    }
    public static function add($horarioParte){

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$horarioParte->getHoraEntrada()."','".$horarioParte->getHoraSalida()."','".$horarioParte->getParteProduccion()->getId()."')";

        mysqli_query($con, $query) or die("Error addCentro");

        parent::desconectar($con);

    }
}