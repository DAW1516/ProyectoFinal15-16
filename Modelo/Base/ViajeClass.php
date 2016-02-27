<?php
namespace Modelo\Base;
/**
 * Created by PhpStorm.
 * User: josu
 * Date: 27/2/16
 * Time: 16:18
 */
class Viaje
{
    private $id;
    private $horaInicio;
    private $horaFin;
    private $albaran;
    private $veiculo;
    private $parteLogistica;

    /**
     * ViajeClass constructor.
     * @param $id
     * @param $horaInicio
     * @param $horaFin
     * @param $albaran
     * @param $veiculo
     * @param $parteLogistica
     */
    public function __construct($id=null, $horaInicio=null, $horaFin=null, $albaran=null, $veiculo=null, $parteLogistica=null)
    {
        $this->setId($id);
        $this->setHoraInicio($horaInicio);
        $this->setHoraFin($horaFin);
        $this->setAlbaran($albaran);
        $this->setVeiculo($veiculo);
        $this->setParteLogistica($parteLogistica);
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
    public function getHoraInicio()
    {
        return $this->horaInicio;
    }

    /**
     * @param null $horaInicio
     */
    public function setHoraInicio($horaInicio)
    {
        $this->horaInicio = $horaInicio;
    }

    /**
     * @return null
     */
    public function getHoraFin()
    {
        return $this->horaFin;
    }

    /**
     * @param null $horaFin
     */
    public function setHoraFin($horaFin)
    {
        $this->horaFin = $horaFin;
    }

    /**
     * @return null
     */
    public function getAlbaran()
    {
        return $this->albaran;
    }

    /**
     * @param null $albaran
     */
    public function setAlbaran($albaran)
    {
        $this->albaran = $albaran;
    }

    /**
     * @return null
     */
    public function getVeiculo()
    {
        return $this->veiculo;
    }

    /**
     * @param null $veiculo
     */
    public function setVeiculo($veiculo)
    {
        $this->veiculo = $veiculo;
    }

    /**
     * @return null
     */
    public function getParteLogistica()
    {
        return $this->parteLogistica;
    }

    /**
     * @param null $parteLogistica
     */
    public function setParteLogistica($parteLogistica)
    {
        $this->parteLogistica = $parteLogistica;
    }


}