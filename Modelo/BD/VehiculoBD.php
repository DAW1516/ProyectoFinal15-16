<?php

require_once __DIR__."/GenericoBD.php";

abstract class VehiculoBD extends GenericoBD{

    private static $tabla = "vehiculos";

    public static function getVehiculosByCentro($centro){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE idCentro = ".$centro->getId();

        $rs = mysqli_query($con, $query) or die("Error getVehiculosByCentro");

        $vehiculos = parent::mapear($rs, "Vehiculo");

        parent::desconectar($con);

        return $vehiculos;

    }

}