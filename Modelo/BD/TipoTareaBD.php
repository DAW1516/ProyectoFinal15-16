<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 28/02/2016
 * Time: 20:16
 */
require_once __DIR__."/GenericoBD.php";
abstract class TipoTareaBD extends GenericoBD
{
    private static $table = "tipostareas";
    public static function getTipoByTarea($tarea){

        $conexion = parent::conectar();

        $query ="Select * from ".self::$table."where id=".$tarea->getTipoTarea()->getId();

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        $tipo= parent::mapear($rs, "TipoTarea");

        return $tipo;

    }

}