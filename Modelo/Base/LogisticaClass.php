<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 10:38
 */
namespace Modelo\Base;
use Modelo\BD;

<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
require_once __DIR__."/TrabajadorClass.php";
require_once __DIR__."/ParteLogisticaClass.php";
require_once __DIR__."/HoraConvenioClass.php";
require_once __DIR__."/../BD/PartesLogisticaBD.php";
require_once __DIR__."/../BD/HorasConvenioBD.php";




<<<<<<< HEAD
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
class Logistica extends Trabajador{

    private $parteLogistica;
    private $horasConvenio;

    /**
     * Logistica constructor.
     * @param $parteLogistica
     */
    public function __construct($dni = null, $nombre = null, $apellido1 = null, $apellido2 = null, $telefono = null, $foto = null, $centro = null,  $trabajadorAusencias = null, $horariosTrabajador = null,$parteLogistica=null,$horasConvenio=null)
    {
        parent::__construct($dni = null, $nombre = null, $apellido1 = null, $apellido2 = null, $telefono = null, $foto = null, $centro = null,  $trabajadorAusencias = null, $horariosTrabajador = null);
        $this->setParteLogistica($parteLogistica);
        $this->setHorasConvenio($horasConvenio);

    }


    /**
     * @return mixed
     */
    public function getParteLogistica()
    {
        if($this->parteLogistica==null){
            $this->setParteLogistica(BD\PartelogisticaBD::getAllByTrabajador($this));
        }
        return $this->parteLogistica;
    }

    /**
     * @param mixed $parteLogistica
     */
    public function setParteLogistica($parteLogistica)
    {
        $this->parteLogistica = $parteLogistica;
    }

    /**
     * @return mixed
     */
    public function getHorasConvenio()
    {
        if($this->horasConvenio==null){
            $this->setHorasConvenio(BD\HorasConvenioBD::getHorasConvenioByPerfil($this));
        }
        return $this->horasConvenio;
    }

    /**
     * @param mixed $horasConvenio
     */
    public function setHorasConvenio($horasConvenio)
    {
        $this->horasConvenio = $horasConvenio;
    }






}