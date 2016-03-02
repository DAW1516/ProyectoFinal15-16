<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes11
 * Date: 1/3/16
 * Time: 9:51
 */

namespace Modelo\Base;

use Modelo\BD;

<<<<<<< HEAD
require_once __DIR__."/../BD/HorasConvenioBD.php";
require_once __DIR__."/../BD/CentroBD.php";
require_once __DIR__."/CentroClass.php";
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
class HoraConvenio
{

    private $id;
    private $horasAnual;
    private $denominacion;
    private $centro;

    /**
     * HoraConvenio constructor.
     * @param $id
     * @param $horasAnual
     * @param $denominacion
     * @param $centro
     */
    public function __construct($id = null, $horasAnual = null, $denominacion = null, $centro = null)
    {
        $this->setId($id);
        $this->setHorasAnual($horasAnual);
        $this->setDenominacion($denominacion);
        $this->setCentro($centro);
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
    public function getHorasAnual()
    {
        return $this->horasAnual;
    }

    /**
     * @param mixed $horasAnual
     */
    public function setHorasAnual($horasAnual)
    {
        $this->horasAnual = $horasAnual;
    }

    /**
     * @return mixed
     */
    public function getDenominacion()
    {
        return $this->denominacion;
    }

    /**
     * @param mixed $denominacion
     */
    public function setDenominacion($denominacion)
    {
        $this->denominacion = $denominacion;
    }

    /**
     * @return mixed
     */
    public function getCentro()
    {
        return $this->centro;
    }

    /**
     * @param mixed $centro
     */
    public function setCentro($centro)
    {
        $this->centro = $centro;
    }



}