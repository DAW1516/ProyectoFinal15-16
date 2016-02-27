<?php

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

}