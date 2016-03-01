<?php

use Modelo\BD;
require_once __DIR__."/../Modelo/BD/RequiresBD.php";

abstract class ControladorLog{

    public static function insertarTrabajador($trabajador){

    }

    public static function getAllEmpresas(){
        return BD\EmpresaBD::getAll();
    }

    public static function getAllPerfiles(){
        return BD\TrabajadorBD::getAllPerfiles();
    }
}