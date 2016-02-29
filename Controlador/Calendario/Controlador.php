<?php

namespace Controlador\Calendario;

session_start();

use Modelo\Base;

require_once __DIR__.'/../../Modelo/Base/LoginClass.php';

class Controlador {

    public static function validarLogin($post){

        //Convertimos el JSON en un array asociativo y creamos un objeto 'Login' con los datos que traemos del post.
        $usuario = json_decode($post['usuario'], true);
        $login = new Base\Login(null, $usuario['usuario'], $usuario['contrasena']);

        //Validamos que el usuario y contraseña introducidos son correctos y en función de la respuesta obtenida de la query (true o false)
        //ejecutaremos unas líneas de código u otras.
        if ($login->validar()){
            echo "Login correcto";
            self::getTrabajadorByLogin($login);
        }
        else {
            echo "Usuario o contraseña incorrectos";
        }
    }

    public static function getTrabajadorByLogin($login){

        //Obtenemos el trabajador mediante carga por demanda y lo guardamos en SESSION.
        $trabajador = $login->getTrabajador();
        $_SESSION['trabajador'] = serialize($trabajador);

    }

}

?>