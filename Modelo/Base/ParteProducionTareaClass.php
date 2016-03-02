<?php

namespace Modelo\Base;
use Modelo\BD;
<<<<<<< HEAD



require_once __DIR__."/TareaClass.php";
require_once __DIR__."/ParteProduccionClass.php";
require_once __DIR__."/../BD/ParteProducionTareaBD.php";
require_once __DIR__."/../BD/TareaBD.php";
require_once __DIR__."/../BD/ParteProduccionBD.php";


=======
require_once __DIR__."/../BD/TareaBD.php";
require_once __DIR__."/../BD/ParteProduccionBD.php";

use Modelo\BD;
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1


/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 13:35
 */
class ParteProducionTarea
{
    private $id;
    private $numeroHoras;
    private $paqueteEntrada;
    private $paqueteSalida;
    private $paqueteTotal;
    //objeto Tarea
    private $tarea = null;
    //objeto parte
    private $parte = null;

    /**
     * TareaParte constructor.
     * @param $id
     * @param $parte
     * @param $tarea
     */
    public function __construct($id=null, $numeroHoras=null, $paqueteEntrada=null, $paqueteSalida=null, $tarea=null, $parte=null)
    {
        $this->setId($id);
        $this->setNumeroHoras($numeroHoras);
        $this->setPaqueteEntrada($paqueteEntrada);
        $this->setPaqueteSalida($paqueteSalida);

        if(!is_null($tarea)){
            $this->setTarea($tarea);
        }
        if(!is_null($parte)){
            $this->setParte($parte);
        }

        $this->getPaqueteTotal();

    }

    /**
     * @return null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNumeroHoras()
    {
        return $this->numeroHoras;
    }

    /**
     * @param mixed $numeroHoras
     */
    public function setNumeroHoras($numeroHoras)
    {
        $this->numeroHoras = $numeroHoras;
    }

    /**
     * @return mixed
     */
    public function getPaqueteEntrada()
    {
        return $this->paqueteEntrada;
    }

    /**
     * @param mixed $paqueteEntrada
     */
    public function setPaqueteEntrada($paqueteEntrada)
    {
        $this->paqueteEntrada = $paqueteEntrada;
    }

    /**
     * @return mixed
     */
    public function getPaqueteSalida()
    {
        return $this->paqueteSalida;
    }

    /**
     * @param mixed $paqueteSalida
     */
    public function setPaqueteSalida($paqueteSalida)
    {
        $this->paqueteSalida = $paqueteSalida;
    }

    /**
     * @return mixed
     */
    public function getPaqueteTotal()
    {
        $total = $this->paqueteEntrada + $this->paqueteSalida;

        $this->setPaqueteTotal($total);

        return $this->paqueteTotal;
    }

    /**
     * @param mixed $paqueteTotal
     */
    public function setPaqueteTotal($paqueteTotal)
    {
        $this->paqueteTotal = $paqueteTotal;
    }


    /**
     * @return null
     */
    public function getTarea()
    {
        //metodo sin programar
        if(is_null($this->tarea)){
<<<<<<< HEAD

            $this->setTarea(BD\TareaBD::getTareaByTareaParte($this));


=======
<<<<<<< HEAD
            $this->tarea = BD\TareaBD::getTareaByProduccionTarea($this);
=======
            $this->setTarea(BD\TareaBD::getTareaByTareaParte($this));
>>>>>>> eeb2c8765f1b43acd30b9f6e6c1c7ead984ed141
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
        }
        return $this->tarea;
    }

    /**
     * @param null $tarea
     */
    public function setTarea($tarea)
    {
        $this->tarea = $tarea;
    }

    /**
     * @return null
     */
    public function getParte()
    {
        //metodo sin programar
        if(is_null($this->parte)){
            $this->setParte(BD\ParteProduccionBD::getParteByTareaParte($this));
        }
        return $this->parte;
    }

    /**
     * @param null $parte
     */
    public function setParte($parte)
    {
        $this->parte = $parte;
    }



}