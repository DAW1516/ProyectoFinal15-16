<?php
namespace Modelo\BD;



require_once __DIR__."/GenericoBD.php";

abstract class CentroBD extends GenericoBD{

    private static $tabla = "centros";

    public static function getCentrosByEmpresa($empresa){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE idEmpresa = ".$empresa->getId();

        $rs = mysqli_query($con, $query) or die("Error getCentrosByEmpresa");

        $centros = parent::mapear($rs, "Centro");

        parent::desconectar($con);

        return $centros;

    }
    public static function getCentrosById($centroId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$centroId;

        $rs = mysqli_query($con, $query) or die("Error getCentrosByEmpresa");

        $centros = parent::mapear($rs, "Centro");

        parent::desconectar($con);

        return $centros;

    }
    //get centro by trabajador

    public static function getCentrosByVehiculo($vehiculo){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = (select idCentro from centros where id=".$vehiculo->getId().")";

        $rs = mysqli_query($con, $query) or die("Error getCentrosByEmpresa");

        $centros = parent::mapear($rs, "Centro");

        parent::desconectar($con);

        return $centros;

    }

    public static function add($centro){

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$centro->getNombre()."','".$centro->getLocalizacion()."','".$centro->getEmpresa()."')";

        mysqli_query($con, $query) or die("Error addCentro");

        parent::desconectar($con);

    }

}
