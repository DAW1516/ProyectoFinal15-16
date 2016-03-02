<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 12:14
 */

namespace Modelo\BD;

use Modelo\BD;
<<<<<<< HEAD
require_once __DIR__."/GenericoBD.php";
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1

abstract class FranjaBD extends GenericoBD{

    private static $tabla = "franjas";

    public static function getFranjaByHorarioFranja($horariosFranja){

        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= (SELECT idFranja FROM horariosfranja WHERE id=".$horariosFranja->getId().")";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Franja");
        parent::desconectar($conexion);
        return $respuesta;
    }

    public static function getFranjaById($id){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$id." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Franja");
        parent::desconectar($conexion);
        return $respuesta;
    }

}