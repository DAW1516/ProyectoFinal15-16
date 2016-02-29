/*
	Es la clase que hara la funcion de router de Vistas principal.
	Comprobara la variable de sesion y si esta vacia nos direccionara al Login, si ya tiene un usuario guardado nos llevara a la vista principal de ese usuario.
*/

<?php

require_once __DIR__.'/Vista/Calendario/CalendarioViews.php';

CalendarioViews::login();

?>