<?php

require_once __DIR__ . "/Vista/Administracion/AdministracionViews.php";

LogisticaViews::insertarTrabajador();
/*
require_once __DIR__ .'/Modelo/BD/EstadoBD.php';
use Modelo\BD;

$respuesta= BD\EstadoBD::selectEstadoById("1");
var_dump($respuesta);


	Es la clase que hara la funcion de router de Vistas principal.
	Comprobara la variable de sesion y si esta vacia nos direccionara al Login, si ya tiene un usuario guardado nos llevara a la vista principal de ese usuario.



require_once __DIR__.'/Vista/Calendario/CalendarioViews.php';

CalendarioViews::login();

?>

*/