<?php
namespace Modelo\Base;



use Modelo\BD;

require_once __DIR__."/../BD/CentroBD.php";

class Empresa{

    private $id;
    private $nombre;
    private $centros; //array Centros

    public function __construct($id = null, $nombre = null)
    {
        $this->setId($id);
        $this->setNombre($nombre);
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
    public function getCentros()
    {
        if(is_null($this->getCentros())){
            $this->setCentros(BD\CentroBD::getCentrosByEmpresa($this));
        }
        return $this->centros;
    }

    /**
     * @param mixed $centros
     */
    public function setCentros($centros)
    {
        $this->centros = $centros;
    }

}