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

    public static function getParteByFecha($trabajador,$fechaSemana){
        $conexion = GenericoBD::conectar();


    }

}