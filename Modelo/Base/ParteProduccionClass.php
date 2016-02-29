<?php
namespace Modelo\Base;

use Modelo\BD\HorarioParteBD;
use Modelo\BD\ParteProduccionTareaBD;
use Modelo\BD\TrabajadorBD;

require_once __DIR__."/../BD/TrabajadorBD.php";
require_once __DIR__ . "/../BD/ParteProducionTareaBD.php";
require_once __DIR__ . "/../BD/HorarioParteBD.php";


/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 13:18
 */
class ParteProduccion
{
    private $id;
    private $estado;
    private $fecha;
    //objeto Produccion
    private $trabajador;
    //array de tareasParte
    private $tareasParte = null;
    //array HorarioParte
    private $horariosParte = null;

    /**
     * ParteProduccion constructor.
     * @param $id
     * @param $estado
     * @param $fecha
     * @param $trabajador
     */
    public function __construct($id=null, $estado=null, $fecha=null, $trabajador=null)
    {
        $this->setId($id);
        $this->setEstado($estado);
        $this->setFecha($fecha);

        if(!is_null($trabajador)){
            $this->setTrabajador($trabajador);
        }

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
     * @return null
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param null $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return null
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param null $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    /**
     * @return null
     */
    public function getTrabajador()
    {
        if(is_null($this->trabajador)){
            //metodo sin programar
            $this->trabajador = TrabajadorBD::getTrabajadorByParte($this);
        }
        return $this->trabajador;
    }

    /**
     * @param null $trabajador
     */
    public function setTrabajador($trabajador)
    {
        $this->trabajador = $trabajador;
    }

    /**
     * @return null
     */
    public function getTareasParte()
    {
        if(is_null($this->tareasParte)){
            //metodo sin programar
            $this->tareasParte = ParteProduccionTareaBD::getAllByParte($this);
        }
        return $this->tareasParte;
    }

    /**
     * @param null $tareasParte
     */
    public function setTareaParte($tarea)
    {
        $this->tareasParte[] = $tarea;
    }

    /**
     * @return null
     */
    public function getHorariosParte()
    {
        if(is_null($this->horariosParte)){
            $this->setHorariosParte(HorarioParteBD::getHorarioParteByParte());
        }
        return $this->horariosParte;
    }

    /**
     * @param null $horariosParte
     */
    public function setHorariosParte($horariosParte)
    {
        $this->horariosParte = $horariosParte;
    }



}