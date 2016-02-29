<?php

require_once __DIR__."/TrabajadorClass.php";
require_once __DIR__."/../BD/ParteProduccionBD.php";

/**
 * Created by PhpStorm.
 * User: Jon
 * Date: 27/02/2016
 * Time: 12:58
 */
class Produccion extends Trabajador
{

    private $partes = null;

    /**
     * Produccion constructor.
     * @param null $partes
     */
    public function __construct($dni=null, $nombre=null, $apellido1=null, $apellido2=null, $telefono=null, $centro=null)
    {
        parent::__construct($dni, $nombre, $apellido1, $apellido2, $telefono, $centro);
    }

    public function setParte($parte)
    {
        $this->partes[]=$parte;
    }

    public function getPartes(){

        if(is_null($this->partes)){

            /*
             * Metodo sin codificar
             */

            $this->partes = ParteProduccionBD::getAllByTrabajador($this);

        }

        return $this->partes;

    }


}