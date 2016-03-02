<?php

namespace Modelo\Base;

use Modelo\BD;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
require_once __DIR__."/../BD/HorasConvenioBD.php";
require_once __DIR__."/../BD/ConvenioAusenciaBD.php";
require_once __DIR__."/../BD/AusenciaBD.php";
require_once __DIR__."/AusenciaClass.php";
require_once __DIR__."/HoraConvenioClass.php";
<<<<<<< HEAD
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c

class ConvenioAusencia
{

    private $id;
    private $fecha;
    private $ausencia;
    private $horaConvenio;

    /**
     * ConvenioAusencia constructor.
     * @param $id
     * @param $fecha
     * @param $ausencia
     * @param $horaConvenio
     */

    public function __construct($id = null, $fecha = null, $ausencia = null, $horaConvenio = null)
    {
        $this->setId($id);
        $this->setFecha($fecha);
        $this->setAusencia($ausencia);
        $this->setHoraConvenio($horaConvenio);
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return mixed
     */
    public function getAusencia()
    {
        return $this->ausencia;
    }

    /**
     * @param mixed $ausencia
     */
    public function setAusencia($ausencia)
    {
        $this->ausencia = $ausencia;
    }

    /**
     * @return mixed
     */
    public function getHoraConvenio()
    {
        if (is_null($this->horaConvenio)){
            $this->setHoraConvenio(BD\HorasConvenioBD::getHorasConvenioByConvenioAusencia($this));
        }
        return $this->horaConvenio;
    }

    /**
     * @param mixed $horaConvenio
     */
    public function setHoraConvenio($horaConvenio)
    {
        $this->horaConvenio = $horaConvenio;
    }



}