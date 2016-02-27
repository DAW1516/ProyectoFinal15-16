<?php

require_once __DIR__."/../BD/VehiculoBD.php";
require_once __DIR__."/../BD/TrabajadorBD.php";
require_once __DIR__ . "/../BD/HorasConveniosBD.php";

class Centro{

    private $id;
    private $nombre;
    private $localizacion;
    private $vehiculos; //array vehiculos
    private $trabajadores; //array trabajadores
    private $horasConvenios; //array horasConvenio

    public function __construct($id = null, $nombre = null, $localizacion = null, $vehiculos = null, $trabajadores = null, $horasConvenios = null)
    {
        $this->setId($id);
        $this->setNombre($nombre);
        $this->setLocalizacion($localizacion);
        $this->setVehiculos($vehiculos);
        $this->setTrabajadores($trabajadores);
        $this->setHorasConvenios($horasConvenios);
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
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getLocalizacion()
    {
        return $this->localizacion;
    }

    /**
     * @param mixed $localizacion
     */
    public function setLocalizacion($localizacion)
    {
        $this->localizacion = $localizacion;
    }

    /**
     * @return mixed
     */
    public function getVehiculos()
    {
        if(is_null($this->vehiculos)){
            $this->setVehiculos(VehiculoBD::getVehiculosByCentro($this));
        }
        return $this->vehiculos;
    }

    /**
     * @param mixed $vehiculos
     */
    public function setVehiculos($vehiculos)
    {
        $this->vehiculos = $vehiculos;
    }

    /**
     * @return mixed
     */
    public function getTrabajadores()
    {
        if(is_null($this->getTrabajadores())){
            $this->setTrabajadores(TrabajadorBD::getTrabajadoresByCentro($this));
        }
        return $this->trabajadores;
    }

    /**
     * @param mixed $trabajadores
     */
    public function setTrabajadores($trabajadores)
    {
        $this->trabajadores = $trabajadores;
    }

    /**
     * @return mixed
     */
    public function getHorasConvenios()
    {
        if(is_null($this->getHorasConvenios())){
            $this->setHorasConvenios(HorasConvenioBD::getHorasConveniosByCentro($this));
        }
        return $this->horasConvenios;
    }

    /**
     * @param mixed $horasConvenios
     */
    public function setHorasConvenios($horasConvenios)
    {
        $this->horasConvenios = $horasConvenios;
    }



}