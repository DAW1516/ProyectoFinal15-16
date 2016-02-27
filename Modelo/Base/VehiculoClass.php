<?php
namespace Modelo\Base;

require_once __DIR__."/../BD/VehiculoBD.php";

class Vehiculo{

    private $id;
    private $matricula;
    private $marca;
    private $viajes; //array viajes

    public function __construct($id = null, $matricula = null, $marca = null, $viajes = null)
    {
        $this->setId($id);
        $this->setMatricula($matricula);
        $this->setMarca($marca);
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

    //CAMBIAR METODO GETVIAJESBYVEHICULO POR EL BUENO

    public function getViajes()
    {
        if(is_null($this->getViajes())){
            $this->setViajes(ViajeBD::getViajesByVehiculo($this));
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

}