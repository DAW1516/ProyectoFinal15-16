<?php

require_once __DIR__.'/GenericoBD.php';

use Modelo\BD\GenericoBD;

abstract class LoginBD extends genericoBD
{

    public static function validarLogin($login){

        $conexion = parent::conectar();

        $query = "SELECT * FROM login WHERE dniTrabajador = '".$login->getUsuario()."' AND password = '".$login->getContrasena()."'";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        parent::desconectar($conexion);

        if (mysqli_num_rows($rs) > 0)
            return true;
        else
            return false;

    }

}