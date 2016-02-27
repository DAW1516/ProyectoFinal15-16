<?php
namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class CentroBD extends GenericoBD{

    public static function getCentrosByEmpresa($empresa){

        return $centros;

    }

}