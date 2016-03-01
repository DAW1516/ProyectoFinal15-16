<?php

namespace Modelo\BD;


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
    public static function getVehiculosById($vehiculoId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$vehiculoId;

        $rs = mysqli_query($con, $query) or die("Error getVehiculosByCentro");

        $vehiculos = parent::mapear($rs, "Vehiculo");

        parent::desconectar($con);

        return $vehiculos;

    }
    public static function getVehiculoByViaje($viaje){
        $con = parent::conectar();
        $query = "SELECT * FROM ".self::$tabla." WHERE id=(SELECT idVehiculo FROM viajes WHERE id=".$viaje->getId().")";
        $rs = mysqli_query($con, $query) or die("Error getVehiculosByCentro");
        $vehiculos = parent::mapear($rs, "Vehiculo");
        parent::desconectar($con);
        return $vehiculos;
    }


    public static function add($vehiculo){

        $con = parent::conectar();

        $query = "INSERT INTO ".self::$tabla." VALUES(null,'".$vehiculo->getMatricula()."','".$vehiculo->getMarca()."','".$vehiculo->getCentro()."')";

        mysqli_query($con, $query) or die("Error addCentro");

        parent::desconectar($con);

    }

}