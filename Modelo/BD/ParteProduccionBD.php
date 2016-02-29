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
    public static function getAllByTrabajador($trabajador){

        $partes = null;

        return $partes;

    }

    public static function getParteByTareaParte($tareaParte){

        $parte = null;

        return $parte;

    }

<<<<<<< HEAD
    public static function getParteByFecha($parte,$fechaSemana){
=======
    public static function getParteByFecha($trabajador,$fechaSemana){
>>>>>>> 26e397d606cce5fff7a368903c53b9022a015b7d
        $conexion = GenericoBD::conectar();


    }

}