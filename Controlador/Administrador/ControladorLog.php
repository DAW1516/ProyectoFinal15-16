<?php

use Modelo\BD;
require_once __DIR__."/../../Modelo/BD/RequiresBD.php";

abstract class ControladorLog{

    public static function insertarTrabajador($trabajador){

    }

    public static function getAllEmpresas(){
        return BD\EmpresaBD::getAll();
    }

    public static function getAllPerfiles(){
        return BD\TrabajadorBD::getAllPerfiles();
    }

    public static function AddVehiculo($vehiculo){
        BD\VehiculoBD::add($vehiculo);
    }

    public static function DeleteVehiculo($id){
        BD\VehiculoBD::deletteVehiculo($id);
    }
     public static function AddEstado($estado){
         BD\EstadoBD::add($estado);
     }
    public static function DeleteEstado($id){
        BD\EstadoBD::delete($id);
    }

}