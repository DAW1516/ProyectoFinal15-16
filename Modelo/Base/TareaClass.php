<?php

namespace Modelo\Base;
use Modelo\BD;

<<<<<<< HEAD

require_once __DIR__."/TipoTareaClass.php";
require_once __DIR__ . "/../BD/TipoTareaBD.php";
require_once __DIR__."/../BD/TareaBD.php";

=======
require_once __DIR__ . "/../BD/TipoTareaBD.php";

use  Modelo\BD;
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1

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
<<<<<<< HEAD
    private $tipo; // objeto
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1



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
<<<<<<< HEAD
=======
>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1
    public function getTipo()
    {
        //metodo sin programar
        if(is_null($this->tipo)){
            $this->setTipo(BD\TipoTareaBD::getTipoByTarea($this));
        }
        return $this->tipo;
    }
<<<<<<< HEAD
    /**
     * @param mixed $tipo
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;
    }
=======
>>>>>>> eeb2c8765f1b43acd30b9f6e6c1c7ead984ed141



>>>>>>> 4012ca1af3bd0f15113f35fb4730ffcd583e2ff1

}