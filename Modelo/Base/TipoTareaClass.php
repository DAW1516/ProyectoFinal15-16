<?php

namespace Modelo\Base;
use Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 13:35
 */

use Modelo\BD;

class TipoTarea
{
    private $id;
    private $descripcion;
    //array de tareas
    private $tareas= null;

    /**
     * TipoTarea constructor.
     * @param $id
     * @param $descripcion
     */
    public function __construct($id=null, $descripcion=null)
    {
        $this->setId($id);
        $this->setDescripcion($descripcion);
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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param mixed $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return null
     */
    public function getTareas()
    {
        if(is_null($this->tareas)){
<<<<<<< HEAD
            $this->tareas = BD\TareaBD::getTareaByTipo($this);
=======
            $this->setTareas(BD\TareaBD::getTareaByTipo($this));
>>>>>>> eeb2c8765f1b43acd30b9f6e6c1c7ead984ed141
        }
        return $this->tareas;
    }

    /**
     * @param null $tares
     */
    public function setTareas($tareas)
    {
        $this->tareas = $tareas;
    }



}