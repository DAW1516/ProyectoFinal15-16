<?php
namespace Modelo\BD;

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

    public static function add($centro){

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$centro->getNombre()."','".$centro->getLocalizacion()."','".$centro->getEmpresa()."')";

        mysqli_query($con, $query) or die("Error addCentro");

        parent::desconectar($con);

    }

}
