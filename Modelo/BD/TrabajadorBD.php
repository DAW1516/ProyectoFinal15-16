<?php
namespace Modelo\BD;

require_once __DIR__."/GenericoBD.php";

abstract class TrabajadorBD extends GenericoBD{

    public static function getTrabajadoresByCentro($centro){

        $con = parent::conectar();

        parent::desconectar($con);

        return $trabajadores;

    }

}