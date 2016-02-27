<?php

namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class HorasConveniosBD extends GenericoBD{

    private static $tabla = "horasConvenios";

    public static function getHorasConveniosByCentro($centro){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE idCentro = ".$centro->getId();

        $rs = mysqli_query($con, $query) or die("Error getHorasConveniosByCentro");

        $horasConvenios = parent::mapear($rs, "HoraConvenio");

        parent::desconectar($con);

        return $horasConvenios;

    }

}