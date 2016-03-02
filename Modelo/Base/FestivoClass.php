<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 1/3/16
 * Time: 10:33
 */

namespace Modelo\Base;

<<<<<<< HEAD
<<<<<<< HEAD
require_once __DIR__."/../BD/FestivoBD.php";
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
require_once __DIR__."/../BD/FestivoBD.php";
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c

class Festivo
{

    private $id;
    private $fecha;
    private $motivo;

    /**
     * Festivo constructor.
     * @param $id
     * @param $fecha
     * @param $motivo
     */
    public function __construct($id = null, $fecha = null, $motivo = null)
    {
        $this->setId($id);
        $this->setFecha($fecha);
        $this->setMotivo($motivo);
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
    public function getMotivo()
    {
        return $this->motivo;
    }

    /**
     * @param mixed $motivo
     */
    public function setMotivo($motivo)
    {
        $this->motivo = $motivo;
    }



}