<?php

require_once __DIR__."/../BD/TareaBD.php";
require_once __DIR__."/../BD/ParteProduccionBD.php";


/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 13:35
 */
class TareaParte
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
     * @param $horaInicio
     * @param $horaFin
     * @param $tarea
     */
    public function __construct($id=null, $numeroHoras=null, $paqueteEntrada=null, $paqueteSalida=null, $horaInicio=null, $horaFin=null, $tarea=null, $parte=null)
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

    /**
     * @return null
     */
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * @return mixed
     */
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
            $this->tarea = TareaBD::getTareaByTareaParte($this);
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
            $this->parte = ParteProduccionBD::getParteByTareaParte($this);
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