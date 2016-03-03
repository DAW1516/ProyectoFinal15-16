<?php
namespace Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 28/02/2016
 * Time: 20:03
 */

require_once __DIR__."/GenericoBD.php";
abstract class ParteProduccionTareaBD extends GenericoBD
{

    private static $tabla = "partesproducciontareas";

    public static function getAllByParte($parte){

        $conexion = GenericoBD::conectar();

        $select = "SELECT * FROM ".self::$tabla." WHERE id = '".$parte>getid()."';";

        $resultado = mysqli_query($conexion,$select);

        $partes = GenericoBD::mapearArray($resultado,"ParteProduccion");

        GenericoBD::desconectar($conexion);

        return $partes;

    }

}