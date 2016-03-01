<?php

namespace Modelo\Base;
use Modelo\BD;

require_once __DIR__ . "/../BD/TipoTareaBD.php";

use  Modelo\BD;

/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 13:35
 */
class Tarea
{
    private $id;
    private $descripcion;



    /**
     * Tarea constructor.
     * @param $id
     * @param $descripcion
     * @param $tipo
     */
    public function __construct($id=null, $descripcion=null, $tipo=null)
    {
        $this->setId($id);
        $this->setDescripcion($descripcion);


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
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * @param null $descripcion
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }

    /**
     * @return null
     */
<<<<<<< HEAD
=======
    public function getTipo()
    {
        //metodo sin programar
        if(is_null($this->tipo)){
            $this->setTipo(BD\TipoTareaBD::getTipoByTarea($this));
        }
        return $this->tipo;
    }
>>>>>>> eeb2c8765f1b43acd30b9f6e6c1c7ead984ed141




}