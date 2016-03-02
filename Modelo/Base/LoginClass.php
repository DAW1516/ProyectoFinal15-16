<?php

namespace Modelo\Base;

use Modelo\BD;


require_once __DIR__.'/TrabajadorClass.php';
require_once __DIR__ . '/../BD/LoginBD.php';
require_once __DIR__.'/../BD/TrabajadorBD.php';

class Login
{

    private $id;
    private $usuario;
    private $contrasena;
    private $trabajador;

    /**
     * Login constructor.
     * @param $usuario
     * @param $contrasena
     * @param $trabajador
     */
    public function __construct($id = null, $usuario = null, $contrasena = null, $trabajador = null)
    {
        $this->setId($id);
        $this->setUsuario($usuario);
        $this->setContrasena($contrasena);
        $this->setTrabajador($trabajador);
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
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * @param mixed $usuario
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    public function validar(){
        \LoginBD::validarLogin($this);
    }

    /**
     * @return mixed
     */
    public function getTrabajador()
    {
        if (is_null($this->trabajador)){
            $this->setTrabajador(BD\TrabajadorBD::getTrabajadorByLogin($this));
        }
        return $this->trabajador;
    }

    /**
     * @param mixed $trabajador
     */
    public function setTrabajador($trabajador)
    {
        $this->trabajador = $trabajador;
    }




}