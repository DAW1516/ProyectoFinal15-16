<?php

namespace Modelo\Base;
use Modelo\BD;
/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 13:35
 */
<<<<<<< HEAD
<<<<<<< HEAD
require_once __DIR__."/TareaClass.php";
require_once __DIR__."/../BD/TipoTareaBD.php";
require_once __DIR__."/../BD/TareaBD.php";

=======

use Modelo\BD;
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======
require_once __DIR__."/TareaClass.php";
require_once __DIR__."/../BD/TipoTareaBD.php";
require_once __DIR__."/../BD/TareaBD.php";

>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c

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
<<<<<<< HEAD

       $this->setTareas(BD\TareaBD::getTareaByTipo($this));

=======
<<<<<<< HEAD
            $this->tareas = BD\TareaBD::getTareaByTipo($this);
=======
            $this->setTareas(BD\TareaBD::getTareaByTipo($this));
>>>>>>> eeb2c8765f1b43acd30b9f6e6c1c7ead984ed141
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
=======

       $this->setTareas(BD\TareaBD::getTareaByTipo($this));

>>>>>>> 43addf624f0de4d3e61625e76838ab104d67cb4c
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
    public function save(){
        BD\TipoTareaBD::insert($this);
    }

    public function modify(){
        BD\TipoTareaBD::update($this);
    }

    public function remove(){
        BD\TipoTareaBD::delete($this);
    }



}