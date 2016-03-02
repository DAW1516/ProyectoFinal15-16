<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:59
 */

namespace Modelo\BD;
<<<<<<< HEAD
require_once __DIR__."/GenericoBD.php";
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1

abstract class TipoFranjaBD extends GenericoBD{

    private static $tabla = "tiposFranjas";

    public static function getTipoFranjaByFranja($franja){
        $conexion=parent::conectar();
        $query="SELECT * FROM ".self::$tabla." WHERE id= ".$franja->getId()." ";
        $rs=mysqli_query($conexion,$query) or die(mysqli_error($conexion));
        $respuesta=parent::mapear($rs,"Franja");
        parent::desconectar($conexion);
        return $respuesta;
    }
    public static function getTipoFranjaById($tipoFranjaId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$tipoFranjaId;

        $rs = mysqli_query($con, $query) or die("Error getTipoFranjaById");

        $tipoFranja = parent::mapear($rs, "TiposFranjas");

        parent::desconectar($con);

        return $tipoFranja;

    }

}