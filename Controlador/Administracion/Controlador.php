<?php
namespace Controlador\Administracion;
use Modelo\Base\Administracion;
use Modelo\Base\Empresa;
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

    public static function insertarTrabajador($datos){
        $trabajador="";

        $centro = BD\CentroBD::getCentrosById($datos['centro']);

        $perfil = $datos['perfil'];

        switch($perfil){
            case "Logistica":
                $trabajador= new Logistica($datos["dni"],$datos['nombre'],$datos['apellido1'],$datos['apellido2'],$datos['telefono'],null/*foto*/,$centro,null,null,null,null);

                break;
            case "Administracion":
                $trabajador= new Administracion($datos["dni"],$datos['nombre'],$datos['apellido1'],$datos['apellido2'],$datos['telefono'],null/*foto*/,$centro,null,null,null);
                break;
            case "Gerencia":
                $trabajador= new Gerencia($datos["dni"],$datos['nombre'],$datos['apellido1'],$datos['apellido2'],$datos['telefono'],null/*foto*/,$centro,null,null,null);
                break;
            case "Produccion":
                $trabajador= new Produccion($datos["dni"],$datos['nombre'],$datos['apellido1'],$datos['apellido2'],$datos['telefono'],null/*foto*/,$centro,null,null,null,null);
                break;
        }

        $trabajador->add();

    }

    public static function insertarEmpresa($datos){
        //no hay centros en la nueva empresa
        $empresa = new Empresa(null, $datos['nombre'], $datos['nif'], null );

        $empresa->add();
    }

    public static function deleteEmpresa($datos){
        $empresa = BD\EmpresaBD::getEmpresaByID($datos['id']);

        $empresa->delete();
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
    public static function getAllTrabajadores(){
        return BD\TrabajadorBD::getAllTrabajadores();
    }

}