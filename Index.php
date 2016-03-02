<?php
require_once __DIR__ .'/Modelo/BD/EstadoBD.php';

namespace Controlador\Logistica;
use Modelo\Base\Centro;
use Modelo\Base\Estado;
use Modelo\Base\Vehiculo;
use Controlador\Administrador;

require_once __DIR__ . '/Controlador/Logistica/Controlador.php';
require_once __DIR__ . '/Controlador/Administrador/Controlador.php';
require_once  __DIR__ .'/Modelo/Base/VehiculoClass.php';
require_once  __DIR__ .'/Modelo/Base/CentroClass.php';
require_once  __DIR__ .'/Modelo/Base/EstadoClass.php';
require_once  __DIR__ .'/Vista/Administracion/AdministracionViews.php';
require_once __DIR__.'/Vista/Calendario/CalendarioViews.php';

    CalendarioViews::generarcalendario();


?>