<?php


namespace Modelo\Base;
use Modelo\BD\ParteProduccionBD;

require_once __DIR__."/TrabajadorClass.php";
require_once __DIR__."/../BD/ParteProduccionBD.php";
<<<<<<< HEAD
<<<<<<< HEAD
require_once __DIR__."/ParteProduccionClass.php";
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
require_once __DIR__."/ParteProduccionClass.php";
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c

/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 12:58
 */
class Produccion extends Trabajador
{

    private $partes = null;

    /**
     * Produccion constructor.
     * @param null $partes
     */
    public function __construct($dni=null, $nombre=null, $apellido1=null, $apellido2=null, $telefono=null, $foto = null, $centro=null, $trabajadorAusencias = null, $horariosTrabajador = null, $partes = null)
    {
        parent::__construct($dni = null, $nombre = null, $apellido1 = null, $apellido2 = null, $telefono = null, $foto = null, $centro = null, $trabajadorAusencias = null, $horariosTrabajador = null);
        $this->setPartes($partes);
    }

    public function setPartes($parte)
    {
        $this->partes=$parte;
    }

    public function addParte($parte){

        $this->partes[]=$parte;

    }

    public function getPartes(){

        if(is_null($this->partes)){

            /*
             * Metodo sin codificar
             */

            $this->partes = ParteProduccionBD::getAllByTrabajador($this);

        }

        return $this->partes;

    }

    public function getPartesByFecha(){

        $diaSemana = date("N");
        $fechaSemana = date("Y-m-d",strtotime("-$diaSemana day"));

        if(is_null($this->partes)){
            $this->partes = ParteProduccionBD::getParteByFecha($this,$fechaSemana);
        }


    }



}