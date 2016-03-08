<?php
namespace Controlador\Administracion;
use Modelo\Base\Administracion;
use Modelo\Base\Centro;
use Modelo\Base\Empresa;
use Modelo\Base\Estado;
use Modelo\Base\Festivo;
use Modelo\Base\Gerencia;
use Modelo\Base\HoraConvenio;
use Modelo\Base\Horarios;
use Modelo\Base\HorariosFranja;
use Modelo\Base\HorariosTrabajadores;
use Modelo\Base\Logistica;
use Modelo\Base\Produccion;
use Modelo\Base\TiposFranjas;
use Modelo\Base\TrabajadorAusencia;
use Modelo\Base\Vehiculo;
use Modelo\BD;
use Vista\Plantilla\Views;

require_once __DIR__."/../../Modelo/BD/RequiresBD.php";
require_once __DIR__ ."/../../Modelo/Base/LogisticaClass.php";
require_once __DIR__ ."/../../Modelo/Base/AdministracionClass.php";
require_once __DIR__ ."/../../Modelo/Base/ProduccionClass.php";
require_once __DIR__ ."/../../Modelo/Base/GerenciaClass.php";
require_once __DIR__ .'/../../Modelo/Base/EstadoClass.php';
require_once __DIR__ .'/../../Modelo/Base/HoraConvenioClass.php';
require_once __DIR__ .'/../../Modelo/Base/HorariosClass.php';
require_once __DIR__."/../../Modelo/BD/LoginBD.php";
require_once __DIR__ .'/../../Modelo/Base/HorariosTrabajadoresClass.php';
require_once __DIR__."/../../Modelo/Base/FestivoClass.php";



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


    public static function getAllFranjas(){
        return BD\FranjaBD::getAll();
    }

    public static function AddHorario($datos)
    {
        $horario= new Horarios(null,$datos["horario"]);
        $idHorario=BD\HorarioBD::add($horario);
        while($datos["horaInicio"]!=$datos["horaFin"]){

            $horaioFranja= new HorariosFranja(null,BD\HorarioBD::getHorarioById($idHorario),BD\FranjaBD::getFranjaById($datos["horaInicio"])        );
            BD\HorarioFranjaBD::add($horaioFranja);

            if($datos["horaInicio"]==25){
                $datos["horaInicio"]=1;
            }else {
                $datos["horaInicio"] = $datos["horaInicio"] + 1;
            }
        }
        $horaioFranja= new HorariosFranja(null,BD\HorarioBD::getHorarioById($idHorario),BD\FranjaBD::getFranjaById($datos["horaInicio"])        );
        BD\HorarioFranjaBD::add($horaioFranja);

    }

    public static function getAllHorarios(){
        return BD\HorarioBD::getAll();
    }

    public static function deleteHorario($datos){
        BD\HorarioBD::delete($datos["id"]);
    }
    public static function addHorarioTrabajador($datos){

        $horarioTrabajador= new HorariosTrabajadores(null,$datos["semana"], BD\TrabajadorBD::getTrabajadorByDni($datos["trabajador"]),BD\HorarioBD::getHorarioById($datos["horario"]));
        BD\HorarioTrabajadorBD::add($horarioTrabajador);
    }

    public static function getAllHoraioTrabajador(){
        return BD\HorarioTrabajadorBD::getAll();
    }
    public static function DeleteHorarioTrabajador($datos){
        BD\HorarioTrabajadorBD::delete($datos["id"]);
    }
    public static function getAllPartesProduccion(){
        return BD\ParteProduccionBD::getAll();
    }
    public static function getAllPartesLogistica(){
        return BD\PartelogisticaBD::getAll();
    }
    public static function DeleteParteProduccion($datos){

        BD\ParteProduccionBD::Delete($datos['id']);
    }
    public static function DeleteParteLogistica($datos){
        BD\PartelogisticaBD::Delete($datos['id']);
    }

    public static function updateValidarParteLogistica($datos){
        BD\PartelogisticaBD::updateValidar($datos['id']);
    }
    public static function updateAbrirParteLogistica($datos){
        BD\PartelogisticaBD::updateAbrir($datos['id']);
    }
    public static function updateValidarParteProduccion($datos){
        BD\ParteProduccionBD::updateValidar($datos['id']);
    }
    public static function updateAbrirParteProduccion($datos){
        BD\ParteProduccionBD::updateAbrir($datos['id']);
    }
    public static function getAllFestivos(){
        return BD\FestivoBD::getAll();
    }
    public static function addFestivo($datos){
        $festivo = new Festivo(null, $datos['fecha'], $datos['motivo']);

        BD\FestivoBD::add($festivo);
    }
    public static function deleteFestivo($datos){
        BD\FestivoBD::delete($datos['id']);
    }
    public static function buscarParteLog($datos){
        return BD\PartelogisticaBD::getAllByTrabajador($datos['dni']);;
    }
    public static function buscarParteProd($datos){
        return BD\ParteProduccionBD::getAllByTrabajador($datos['dni']);
    }
    public static function getPerfilByDni($dni){
        $trabajador = new Logistica($dni);
        $perfil = BD\TrabajadorBD::getPerfilByDni($trabajador);


        return $perfil;

    }

    public static function getParte($dni, $perfil){
        $trabajador = new Logistica($dni);

        if($perfil == "Produccion"){
            return $partes = BD\ParteProduccionBD::getAllByTrabajador($trabajador);
        }
        elseif($perfil == "Logistica"){
            return $partes = BD\PartelogisticaBD::getAllByTrabajador($trabajador);
        }

    }
}