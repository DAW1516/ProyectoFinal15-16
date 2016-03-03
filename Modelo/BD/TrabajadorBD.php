<?php
namespace Modelo\BD;



require_once __DIR__."/GenericoBD.php";

abstract class TrabajadorBD extends GenericoBD{

    private static $tabla = "trabajadores";

    public static function getTrabajadoresByCentro($centro){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE idCentro = ".$centro->getId();

        $rs = mysqli_query($con, $query) or die("Error getTrabajadoresByCentro");

        $trabajadores = parent::mapear($rs, "Trabajador");

        parent::desconectar($con);

        return $trabajadores;

    }

    public static function getTrabajadorByLogin($login){
        $conexion = parent::conectar();
        $query = "SELECT * FROM trabajadores WHERE dni = ".$login->getUsuario() ." ";
        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        $trabajador = parent::mapear($rs, "Trabajador");
        parent::desconectar($conexion);
        return $trabajador;
    }

    public static function getTrabajadorByHorariosTrabajadores($horarioTrabajador){

        $conexion = parent::conectar();
        $query = "SELECT * FROM trabajadores WHERE dni = (select dniTrabajador from horarioTrabajadores where id=".$horarioTrabajador->getId() .") ";
        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        $trabajador = parent::mapear($rs, "Trabajador");
        parent::desconectar($conexion);
        return $trabajador;

    }
    public static function getTrabajadorByParte($parte){
        return $parte;
    }

    public static function getTrabajadorById($trabajadorId){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla." WHERE id = ".$trabajadorId;

        $rs = mysqli_query($con, $query) or die("Error getTrabajadorById");

        $trabajador = parent::mapear($rs, "Trabajador");

        parent::desconectar($con);

        return $trabajador;

    }

    public static function add($trabajador){

        $con = parent::conectar();

        //SACAR PERFIL ID///
        $perfil = get_class($trabajador);
        $perfil = substr(strrchr($perfil, "\\"), 1);
        $queryPerfil = "SELECT id FROM perfiles WHERE tipo = '" . $perfil."'";
        $rs = mysqli_query($con, $queryPerfil) or die("ErrorqueryPerfil");
        $fila = mysqli_fetch_array($rs);
        $idPerfil = $fila['id'];
        //////////

        $query = "INSERT INTO ".self::$tabla." VALUES('".$trabajador->getDni()."','".$trabajador->getNombre()."','".$trabajador->getApellido1()."','".$trabajador->getApellido2()."','".$trabajador->getTelefono()."',".$trabajador->getCentro()->getId().",".$idPerfil.",'foto')"; //NOTA no hay objeto Perfil usamos getClass?? ----> esto no se puede: $trabajador->getPerfil()->getId()
        var_dump($query);
        mysqli_query($con, $query) or die("Error addTrabajador");




        parent::desconectar($con);

    }



    public static function deleteTrabajador($dni)
    {

        $con = parent::conectar();

        $query = "DELETE FROM " . self::$tabla . " WHERE `dni`='" . $dni."'";

        mysqli_query($con, $query) or die(mysqli_error($con));

        parent::desconectar($con);
    }

    public static function getAllPerfiles(){

        $con = parent::conectar();

        $query = "SELECT id,tipo FROM perfiles";

        $rs = mysqli_query($con, $query) or die("Error getAllPerfiles");

        $perfil = array();
        while($fila = mysqli_fetch_assoc($rs)){
            $perfil[] = array($fila['id'],$fila['tipo']);
        }

        parent::desconectar($con);

        return $perfil;

    }

    public static function getAllTrabajadores(){

        $con = parent::conectar();

        $query = "SELECT * FROM ".self::$tabla;

        $rs = mysqli_query($con, $query) or die("Error getAllTipoTrabajadores");

        $trabajadores = null;
        while($fila = mysqli_fetch_assoc($rs)) {
            //SELECT DEL TIPO POR ID PERFIL
            $queryPerfil = "SELECT tipo FROM perfiles WHERE id = ".$fila['idPerfil'];
            $rsPerfil = mysqli_query($con, $queryPerfil) or die("error queryPerfilAllTrabajadores");
            $filaPerfil = mysqli_fetch_array($rsPerfil);
            /////
            $trabajador = parent::mapear($rs, $filaPerfil['tipo']);
            $trabajadores[] = $trabajador;
            }

        parent::desconectar($con);
        return $trabajadores;

    }

}