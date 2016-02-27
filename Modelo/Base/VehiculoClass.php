<?php
namespace Modelo\Base;

namespace Modelo\Base;

use Modelo\BD;

require_once __DIR__."/../BD/ViajeBD.php";

class Vehiculo{

    private $id;
    private $matricula;
    private $marca;
    private $centro; // objeto centro (no he codificado nada BD)
    private $viajes; // array viajes

    public function __construct($id = null, $matricula = null, $marca = null, $centro = null, $viajes = null)
    {
        $this->setId($id);
        $this->setMatricula($matricula);
        $this->setMarca($marca);
        $this->setCentro($centro);
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
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }

    /**
     * @return mixed
     */
    public function getMarca()
    {
        return $this->marca;
    }

    /**
     * @param mixed $marca
     */
    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    /**
     * @return mixed
     */
<<<<<<< HEAD
    public function getCentro()
    {
        return $this->centro;
    }

    /**
     * @param mixed $centro
     */
    public function setCentro($centro)
    {
        $this->centro = $centro;
    }

    /**
     * @return mixed
     */
=======

    //CAMBIAR METODO GETVIAJESBYVEHICULO POR EL BUENO

>>>>>>> ca67821639d65636827aad9c70e51223d762a15c
    public function getViajes()
    {
        if(is_null($this->getViajes())){
            $this->setViajes(BD\ViajeBD::getViajesByVehiculo($this));
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

    public function add()
    {
        BD\VehiculoBD::add($this);
    }

}