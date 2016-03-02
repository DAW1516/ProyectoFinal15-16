<?php
namespace Controlador\Administrador;
use Modelo\Base\Administracion;
use Modelo\Base\Gerencia;
use Modelo\Base\Logistica;
use Modelo\Base\Produccion;
use Modelo\Base\TrabajadorAusencia;
use Modelo\BD;
require_once __DIR__."/../../Modelo/BD/RequiresBD.php";
require_once __DIR__ ."/../../Modelo/Base/LogisticaClass.php";
require_once __DIR__ ."/../../Modelo/Base/AdministracionClass.php";
require_once __DIR__ ."/../../Modelo/Base/ProduccionClass.php";
require_once __DIR__ ."/../../Modelo/Base/GerenciaClass.php";

abstract class Controlador{

    public static function insertarTrabajador($post){
        $trabajador="";
        switch( BD\TrabajadorBD::getPerfilById($post['perfil'])){
            case "Logistica":
                $trabajador= new Logistica($post["dni"]);
                break;
            case "Gerencia":
                $trabajador= new Gerencia();
                break;
            case "Produccion":
                $trabajador= new Produccion();
                break;
            case "Administracion":
                $trabajador= new Administracion();
                break;
        }

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