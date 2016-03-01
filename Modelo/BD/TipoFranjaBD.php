<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:59
 */

namespace Modelo\BD;

abstract class TipoFranjaBD extends GenericoBD{

    private static $tabla = "tiposFranjas";

    public static function getTipoFranjaById($tipoFranjaId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$tipoFranjaId;

        $rs = mysqli_query($con, $query) or die("Error getTipoFranjaById");

        $tipoFranja = parent::mapear($rs, "TiposFranjas");

        parent::desconectar($con);

        return $tipoFranja;

    }

}