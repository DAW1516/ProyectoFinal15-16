<?php
/**
 * Created by PhpStorm.
 * User: alain
 * Date: 27/02/2016
 * Time: 14:46
 */

require_once __DIR__ .'/../BD/EstadoBD.php';

class ParteLogistica{

    private $id;
    private $trabajador;
    private $estado;
    private $nota;

    /**
     * ParteLogistica constructor.
     * @param $id
     * @param $trabajador
     * @param $estado
     * @param $nota
     */
    public function __construct($id=null, $trabajador=null, $estado=null, $nota=null)
    {
        $this::setId($id);
        $this::setTrabajador($trabajador);
        $this::setEstado($estado);
        $this::setNota($nota);
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
           $estado=estadoBD::select_estado_by_partelogistica($this);
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




}
