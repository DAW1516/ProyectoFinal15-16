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


    public static function getTrabajadorByParte($parte){

        $trabajador = null;

        return $trabajador;
    }

    public function getTareasParteByFecha(){

        $diaSemana = date("N");
        $fechaSemana = date("d/m/Y",strtotime("-$diaSemana day"));

        if(is_null($this->tareasParte)){
            $this->tareasParte = ParteProduccionTareaBD::getTareasByParteAndFecha($this,$fechaSemana);
        }

        return $this->tareasParte;
    }

}