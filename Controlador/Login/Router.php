<?php

namespace Controlador\Login;

require_once __DIR__.'/Controlador.php';

use Controlador\Login;

switch($_GET['cod']){

    case "1":
        Controlador::validarLogin($_POST);
        break;
    case "2":
        Controlador::changePassword($_POST);
        break;

}