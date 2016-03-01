<<<<<<< HEAD
<?php
require_once __DIR__ .'/Modelo/BD/EstadoBD.php';

$respuesta=estadoBD::select_estado_by_id("1");
var_dump($respuesta);
=======
/*
	Es la clase que hara la funcion de router de Vistas principal.
	Comprobara la variable de sesion y si esta vacia nos direccionara al Login, si ya tiene un usuario guardado nos llevara a la vista principal de ese usuario.
*/

<?php

require_once __DIR__.'/Vista/Calendario/CalendarioViews.php';

CalendarioViews::login();
>>>>>>> 71d46c79aa49fb27e8d51cc5d4930c7d572374e1

?>