<?php

require_once __DIR__;

class Trabajador{

    private $dni;
    private $nombre;
    private $apellido1;
    private $apellido2;
    private $telefono;
    private $login; // objeto login
    private $partesLogistica; // array PartesLogistica
    private $partesProduccion; // array PartesProduccion
    private $trabajadorAusencias; // array ausencias --tabla intermedia
    private $horariosTrabajador; // array Horarios(puede tener mñana, tarde y noche) --tabla intermedia

    public function __construct($dni = null, $nombre = null, $apellido1 = null, $apellido2 = null, $telefono = null, $login = null, $partesLogistica = null, )
    {
    }

}