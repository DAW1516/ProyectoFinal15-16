<?php

namespace Modelo\BD;

require_once __DIR__.'/GenericoBD.php';

use Modelo\BD\GenericoBD;

abstract class LoginBD extends genericoBD
{

    public static function validarLogin($login, $dni){

        $conexion = parent::conectar();

        $query = "SELECT * FROM login WHERE dniTrabajador = '".$dni."' AND password = '".$login->getPassword()."'";

        $rs = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

        parent::desconectar($conexion);

        if (mysqli_num_rows($rs) > 0)
            return true;
        else
            return false;

    }

    public static function changePassword($login){

        $con = parent::conectar();

        $query = "UPDATE login SET password = '".$login->getPassword()."' WHERE dniTrabajador = '".$login->getTrabajador()->getDni()."'";

        $rs = mysqli_query($con, $query) or die(mysqli_error($con));

        parent::desconectar($con);

        if (mysqli_num_rows($rs) > 0){
            return true;
        }
        else {
            return false;
        }

    }

}