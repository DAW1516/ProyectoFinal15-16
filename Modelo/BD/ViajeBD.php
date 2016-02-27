<?php

namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class ViajeBD extends GenericoBD{

    private static $tabla = "viajes";

    public static function getViajesByVehiculo($vehiculo){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE idVehiculo = ".$vehiculo->getId();

        $rs = mysqli_query($con, $query) or die("Error getViajesByVehiculo");

        $viajes = parent::mapear($rs, "Viaje");

        parent::desconectar($con);

        return $viajes;

    }

}