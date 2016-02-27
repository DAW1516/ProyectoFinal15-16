<?php
namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class HorasConvenioBD extends GenericoBD{

    public static function getHorasConvenioByCentro($centro){

        return $horasConvenio;

    }

}