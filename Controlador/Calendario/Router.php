<?php

namespace Controlador\Calendario;

require_once __DIR__.'/Controlador.php';

use Controlador\Calendario;

switch($_GET['cod']){

    case "1":
        Controlador::validarLogin($_POST);
        break;

}