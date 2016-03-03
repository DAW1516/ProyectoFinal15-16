<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:59
 */

namespace Modelo\BD;
require_once __DIR__."/GenericoBD.php";

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
    public static function insert($tipoFranja){

        $conexion = GenericoBD::conectar();

        $insert = "INSERT INTO ".self::$tabla." VALUES (null,'".$tipoFranja->getDescripcion()."','".$tipoFranja->getTipo()."'".";)";

        mysqli_query($conexion,$insert) or die("Error InsertTipoFranja");

        GenericoBD::desconectar($conexion);

    }

    public static function update($tipoFranja){
        $conexion = GenericoBD::conectar();

        $update = "UPDATE ".self::$tabla." SET precio='".$tipoFranja->getDescripcion()."', tipo='".$tipoFranja->getTipo()."' WHERE id = '".$tipoFranja->getId()."';";
        mysqli_query($conexion,$update) or die("Error UpdateTipoFranja");

        GenericoBD::desconectar($conexion);
    }

    public static function delete($tipoFranja){
        $conexion = GenericoBD::conectar();

        $delete = "DELETE FROM ".self::$tabla." WHERE id = '".$tipoFranja->getId()."';";

        mysqli_query($conexion,$delete) or die("Error DeleteTipoFranja");

        GenericoBD::desconectar($conexion);
    }

}