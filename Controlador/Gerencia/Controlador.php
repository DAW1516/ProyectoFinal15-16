<?php
namespace Controlador\Gerencia;
use Modelo\Base\Administracion;
use Modelo\Base\Centro;
use Modelo\Base\Empresa;
use Modelo\Base\Estado;
use Modelo\Base\Gerencia;
use Modelo\Base\HoraConvenio;
use Modelo\Base\Logistica;
use Modelo\Base\Produccion;
use Modelo\Base\TiposFranjas;
use Modelo\Base\Trabajador;
use Modelo\Base\TrabajadorAusencia;
use Modelo\Base\Vehiculo;
use Modelo\BD;
require_once __DIR__."/../../Modelo/BD/RequiresBD.php";
require_once __DIR__."/../../Modelo/BD/LoginBD.php";


abstract class Controlador{

    public static function insertarTrabajador($datos, $file){
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


        self::imagenTrabajador($trabajador, $file);

        $trabajador->add();

        $md5 = md5($trabajador->getDni());

        BD\LoginBD::add($trabajador, $md5);

    }

    public static function imagenTrabajador($trabajador, $file){

        $x = $trabajador->getDni();

        $url = "Vista/Fotos/".$x."/".$file['foto']['name'];

        self::subirImagen($file, $x);

        $trabajador->setFoto($url);

    }

    public static function subirImagen($file, $x)
    {

        $dir = opendir(__DIR__."/../../Vista/Fotos/");

        if (is_uploaded_file($file['foto']['tmp_name'])) {
            if (!file_exists(__DIR_."/../../Vista/Fotos/".$x)){
                mkdir(__DIR__."/../../Vista/Fotos/".$x);
                chmod(__DIR__."/../../Vista/Fotos/".$x,0755);

                move_uploaded_file($file['foto']['tmp_name'], __DIR__."/../../Vista/Fotos/".$x."/".basename($file['foto']['name']));
            }



            echo "<br>Fichero subido: " . $file['foto']['name'];

        } else {

            return "Error al subir el fichero: " . $file['foto']['name'];

        }
        closedir($dir);

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
        $x = $datos['x'];
        BD\LoginBD::deleteLoginByDni($datos["dni".$x]);
        BD\TrabajadorBD::deleteTrabajador($datos["dni".$x]);
    }

    public static function AddCentro($datos){
        $empresa = BD\EmpresaBD::getEmpresaByID($datos['empresa']);
        $centro = new Centro(null, $datos['nombre'], $datos['localizacion'], $empresa);
        $centro->add();
    }
    public static function DeleteCentro($datos){
        $centro = BD\CentroBD::getCentrosById($datos['id']);
        $centro->delete();
    }
    public static function getAllTiposFranjas(){
        return BD\TipoFranjaBD::getAll();
    }
    public static function updateTipoFranja($datos){
        $tipo = new TiposFranjas($datos['id'],null,$datos['nuevo']);

        BD\TipoFranjaBD::update($tipo);
    }
    public static function AddTipoFranja($datos){
        $tipo = new TiposFranjas(null, $datos['tipo'], $datos['precio']);

        $tipo->save();
    }
    public static function DeleteTipoFranja($datos){
        \Modelo\BD\TipoFranjaBD::delete($datos['id']);
    }
    public static function UpdateHorasConvenio($datos){
        $horas = new HoraConvenio($datos['id'],$datos['nuevo']);

        BD\HorasConvenioBD::UpdateHorasConvenio($horas);
    }

}