<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes10
 * Date: 29/2/16
 * Time: 11:36
 */
namespace Modelo\Base;

use Modelo\BD;
<<<<<<< HEAD
<<<<<<< HEAD
=======
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
require_once __DIR__."/../BD/TrabajadorBD.php";
require_once __DIR__."/../BD/HorarioBD.php";
require_once __DIR__."/../BD/HorarioTrabajadorBD.php";
require_once __DIR__."/TrabajadorClass.php";
require_once __DIR__."/HorariosClass.php";
<<<<<<< HEAD
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c

class HorariosTrabajadores{

    private $id;
    private $numeroSemana;
    private $trabajador;
    private $horario;

    /**
     * HorariosTrabajadores constructor.
     * @param $id
     * @param $numeroSemana
     * @param $trabajador
     * @param $horario
     */
    public function __construct($id = null, $numeroSemana= null, $trabajador= null, $horario= null)
    {
        $this->setId($id);
        $this->setNumeroSemana($numeroSemana);
        $this->setTrabajador($trabajador);
        $this->setHorario($horario);
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
    public function getNumeroSemana()
    {
        return $this->numeroSemana;
    }

    /**
     * @param mixed $numeroSemana
     */
    public function setNumeroSemana($numeroSemana)
    {
        $this->numeroSemana = $numeroSemana;
    }

    /**
     * @return mixed
     */
    public function getTrabajador()
    {
        if(is_null($this->trabajador)){
            $this->setTrabajador(BD\TrabajadorBD::getTrabajadorByHorariosTrabajadores($this));
        }
        return $this->trabajador;
    }

    /**
     * @param mixed $trabajador
     */
    public function setTrabajador($trabajador)
    {
        $this->trabajador = $trabajador;
    }

    /**
     * @return mixed
     */
    public function getHorario()
    {
        if(is_null($this->horario)){
            $this->setHorario(BD\HorarioBD::getHorarioByHorarioTrabajador($this));
        }
        return $this->horario;
    }

    /**
     * @param mixed $horario
     */
    public function setHorario($horario)
    {
        $this->horario = $horario;
    }

    public function add(){
        BD\HorarioTrabajadorBD::add($this);
    }

}