<?php

namespace Controlador\Logistica;
use Modelo\Base\Centro;
use Modelo\Base\Vehiculo;

require_once __DIR__ .'/Controlador/Logistica/ControladorParteLogistica.php';
require_once  __DIR__ .'/Modelo/Base/VehiculoClass.php';
require_once  __DIR__ .'/Modelo/Base/CentroClass.php';
$centro= new Centro("3");
$vehiculo= new Vehiculo(null,"matricula","citroen",$centro);
ControladorLogistica::DeleteVehiculo("1");
?>