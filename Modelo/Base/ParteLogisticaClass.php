<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 27/02/2016
 * Time: 14:46
 */
namespace Modelo\Base;
use Modelo\BD;


require_once __DIR__."/LogisticaClass.php";
require_once __DIR__."/ViajeClass.php";
require_once __DIR__."/EstadoClass.php";
require_once __DIR__."/../BD/PartesLogisticaBD.php";
require_once __DIR__."/../BD/ViajeBD.php";
require_once __DIR__ .'/../BD/EstadoBD.php';
require_once __DIR__."/../BD/TrabajadorBD.php";


class ParteLogistica{

    private $id;
    private $trabajador;// Objeto logistica?? o Trabajador??
    private $estado;
    private $nota;
    private $viajes;

    /**
     * ParteLogistica constructor.
     * @param $id
     * @param $trabajador
     * @param $estado
     * @param $nota
     */
    public function __construct($id=null, $trabajador=null, $estado=null, $nota=null, $viajes=null)
    {
        $this->setId($id);
        $this->setTrabajador($trabajador);
        $this->setEstado($estado);
        $this->setNota($nota);
        $this->setViajes($viajes);
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
    public function getTrabajador()
    {
        if(is_null($this->trabajador)){
            $this->setTrabajador(BD\TrabajadorBD::getTrabajadorByParte($this));
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
    public function getEstado()
    {
       if($estado=null){
           $this->setEstado(BD\EstadoBD::selectEstadoByParteLogistica($this));
       }
        return $estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getNota()
    {
        return $this->nota;
    }

    /**
     * @param mixed $nota
     */
    public function setNota($nota)
    {
        $this->nota = $nota;
    }

    /**
     * @return mixed
     */
    public function getViajes()
    {
       if($this->viajes=null){
           $this->setViajes(BD\ViajeBD::getAll($this));
       }
        return $this->viajes;
    }

    /**
     * @param mixed $viajes
     */
    public function setViajes($viajes)
    {
        $this->viajes = $viajes;
    }

    public function add(){
        BD\PartelogisticaBD::add($this);
    }
}
