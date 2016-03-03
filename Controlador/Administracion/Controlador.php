<?php
namespace Controlador\Administracion;
use Modelo\Base\Administracion;
use Modelo\Base\Empresa;
use Modelo\Base\Estado;
use Modelo\Base\Gerencia;
use Modelo\Base\HoraConvenio;
use Modelo\Base\Logistica;
use Modelo\Base\Produccion;
use Modelo\Base\TrabajadorAusencia;
use Modelo\Base\Vehiculo;
use Modelo\BD;
require_once __DIR__."/../../Modelo/BD/RequiresBD.php";
require_once __DIR__ ."/../../Modelo/Base/LogisticaClass.php";
require_once __DIR__ ."/../../Modelo/Base/AdministracionClass.php";
require_once __DIR__ ."/../../Modelo/Base/ProduccionClass.php";
require_once __DIR__ ."/../../Modelo/Base/GerenciaClass.php";
require_once __DIR__ .'/../../Modelo/Base/EstadoClass.php';
require_once __DIR__ .'/../../Modelo/Base/HoraConvenioClass.php';

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

    public static function AddVehiculo($datos){
        $centro= BD\CentroBD::getCentrosById($datos["centro"]);
        $vehiculo= new Vehiculo(null,$datos["matricula"],$datos["marca"],$centro);
        BD\VehiculoBD::add($vehiculo);
    }

    public static function deleteVehiculo($datos){
        BD\VehiculoBD::deletteVehiculo($datos["id"]);
    }
     public static function AddEstado($datos){
         $estado= new Estado(null,$datos["tipo"]);
         BD\EstadoBD::add($estado);
     }
    public static function DeleteEstado($datos){
        BD\EstadoBD::delete($datos["id"]);
    }
    public static function getAllTrabajadores(){
        return BD\TrabajadorBD::getAllTrabajadores();
    }
    public static function getAllEstados(){
        return BD\EstadoBD::getAll();
    }
    public static function getAllCentros(){
        return BD\CentroBD::getAll();
    }
    public static function getAllVehiculos(){
        return BD\VehiculoBD::getAll();
    }
    public static function AddHorasConvenio($datos){
        $centro= BD\CentroBD::getCentrosById($datos["centro"]);
        $horaconvenio= new HoraConvenio(null,$datos["horasAnual"],$datos["denominacion"],$centro);
        BD\HorasConvenioBD::add($horaconvenio);
    }
    public static function getAllHorasConvenio(){
        return BD\HorasConvenioBD::getAll();
    }
    public static function deleteHorasConvenio($datos){
        BD\HorasConvenioBD::delete($datos["id"]);
    }
    public static function deleteTrabajador($datos){

        BD\TrabajadorBD::deleteTrabajador($datos["dni"]);
    }
}